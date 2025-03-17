<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<form id="payment-form">
    <div id="payment-element">
        <!-- Elements will create form elements here -->
    </div>
    <button id="submit">Submit</button>
    <div id="error-message">
        <!-- Display error message to your customers here -->
    </div>
</form>

<script>
    const stripe = Stripe('pk_test_51LQ4upLyWqXvHGw87l4P8Ss9evguEZujDwMiR8PduPEEKqPSwlC13FvRsB4nTvhf917Eojpn2Efun3fcz2x3BUpJ000TtcH37h');
    const options = {
        clientSecret: '{{$intent->client_secret}}',
        // Fully customizable with appearance API.
        appearance: {/*...*/},
    };

    // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
    const elements = stripe.elements(options);

    // Create and mount the Payment Element
    const paymentElement = elements.create('payment');
    paymentElement.mount('#payment-element');


    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {error} = await stripe.confirmSetup({
            //`Elements` instance that was used to create the Payment Element
            elements,
            confirmParams: {
                return_url: 'https://webhook.site/4709d3b9-dea4-4fc5-9b65-bf0a50f8ba85',
            }
        });

        if (error) {
            // This point will only be reached if there is an immediate error when
            // confirming the payment. Show error to your customer (for example, payment
            // details incomplete)
            const messageContainer = document.querySelector('#error-message');
            messageContainer.textContent = error.message;
        } else {
            // Your customer will be redirected to your `return_url`. For some payment
            // methods like iDEAL, your customer will be redirected to an intermediate
            // site first to authorize the payment, then redirected to the `return_url`.
        }
    });
</script>
</body>
</html>
