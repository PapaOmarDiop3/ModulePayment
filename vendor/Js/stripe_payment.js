// scripts/stripe_payment.js

document.addEventListener('DOMContentLoaded', function() {
    var stripe = Stripe('YOUR_STRIPE_PUBLIC_KEY'); // Remplacez par votre clé publique Stripe
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                console.error(result.error.message);
            } else {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = 'stripe_payment_process.php';

                var tokenInput = document.createElement('input');
                tokenInput.type = 'hidden';
                tokenInput.name = 'stripeToken';
                tokenInput.value = result.token.id;
                form.appendChild(tokenInput);

                var amountInput = document.createElement('input');
                amountInput.type = 'hidden';
                amountInput.name = 'amount';
                amountInput.value = document.getElementById('amount').value;
                form.appendChild(amountInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});
