#!/bin/bash

# Get the end date from the user
end_date="$1"

# Validate the input
if [[ -z "$end_date" ]]; then
    echo "Error: Please provide an end date in the format YYYY-MM-DD."
    exit 1
fi

# Calculate the start date (365 days before the end date)
start_date=$(date -d "$end_date - 388 days" +%Y-%m-%d)

# Loop through each day in the range
current_date="$start_date"
while [ "$(date -d "$current_date" +%Y-%m-%d)" != "$(date -d "$end_date + 1 day" +%Y-%m-%d)" ]; do
    # Format current date as "DD/MM/YYYY"
    formatted_date=$(date -d "$current_date" +%d/%m/%Y)
    echo "$formatted_date"

    # Run the Laravel command
    echo "Running command for date: $formatted_date"
    php artisan reports:send-sub-accounts-details-by-day "$formatted_date"

    # Move to the next day
    current_date=$(date -d "$current_date + 1 day" +%Y-%m-%d)
done

