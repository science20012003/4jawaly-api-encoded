const fs = require('fs');
const libphonenumber = require('google-libphonenumber');
const path = require('path');

// Read the file path from command line argument
const filePath = process.argv[2];

if (!filePath) {
    console.error('Error: No file path provided.');
    process.exit(1);
}

// Read JSON file
fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) {
        console.error('Error reading the file:', err);
        process.exit(1);
    }

    try {
        const inputData = JSON.parse(data);

        // Validate JSON structure
        if (!inputData.numbers || !Array.isArray(inputData.numbers) || !inputData.iso_country) {
            console.error('Invalid JSON structure');
            process.exit(1);
        }

        // Parse ISO country codes
        const isoCountries = inputData.iso_country.split(',');

        // Phone number parser instance
        const phoneUtil = libphonenumber.PhoneNumberUtil.getInstance();

        // Output structure
        const result = {
            mobile: {},
            invalid: [],
            duplicated: {},
            count_total: 0, // Total count of unique valid numbers
            count_per_country: {} // Count per country
        };

        const seenNumbers = new Set();
        const duplicateTracker = {};

        // Process numbers
        inputData.numbers.forEach(number => {
            let isValid = false;
            let formattedNumber = null;
            let countryMatch = null;

            for (let country of isoCountries) {
                try {
                    const parsedNumber = phoneUtil.parse(number, country);

                    if (phoneUtil.isValidNumber(parsedNumber)) {
                        formattedNumber = phoneUtil.format(parsedNumber, libphonenumber.PhoneNumberFormat.E164).replace('+', '');
                        countryMatch = country;
                        isValid = true;
                        break;
                    }
                } catch (error) {
                    // Ignore errors
                }
            }

            if (isValid && formattedNumber) {
                if (!result.mobile[countryMatch]) {
                    result.mobile[countryMatch] = [];
                    result.count_per_country[countryMatch] = 0; // Initialize count
                }

                if (seenNumbers.has(formattedNumber)) {
                    if (!result.duplicated[countryMatch]) {
                        result.duplicated[countryMatch] = [];
                    }
                    if (!duplicateTracker[formattedNumber]) {
                        duplicateTracker[formattedNumber] = true;
                        result.duplicated[countryMatch].push(formattedNumber);
                    }
                } else {
                    seenNumbers.add(formattedNumber);
                    result.mobile[countryMatch].push(formattedNumber);
                    result.count_total++; // Increment total count
                    result.count_per_country[countryMatch]++; // Increment country count
                }
            } else {
                result.invalid.push(number);
            }
        });

        console.log(JSON.stringify(result));

    } catch (error) {
        console.error('Error parsing JSON:', error);
        process.exit(1);
    }
});
