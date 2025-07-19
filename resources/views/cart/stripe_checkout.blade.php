@extends('layouts.users')
@section('title', 'Stripe Checkout')


@section('styles')
<style>
    .credit-card-visa {
        background: linear-gradient(135deg, #1a1f71, #3a47d5);
        border-radius: 20px;
        padding: 20px 25px;
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
        min-height: 220px;
        position: relative;
        overflow: hidden;
    }

    .credit-card-visa .cc-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chip-icon {
        height: 40px;
    }

    .brand-icon {
        height: 36px;
    }

    .cc-number {
        font-size: 1.5rem;
        letter-spacing: 2.5px;
        margin: 35px 0;
        word-spacing: 4px;
    }

    .cc-bottom {
        display: flex;
        justify-content: space-between;
    }

    .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        opacity: 0.8;
    }

    .value {
        font-size: 1rem;
        font-weight: 500;
    }
</style>

@endsection
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">

                    <!-- <h3 class="text-center mb-4 text-primary"><i class="bi bi-credit-card-2-front"></i> Stripe Checkout</h3> -->

                    {{-- Credit Card Live Preview --}}
                    <div class="credit-card-visa mb-4 shadow-lg">
                        <div class="cc-top d-flex justify-content-between">
                            <img src="https://img.icons8.com/color/48/000000/sim-card-chip.png" class="chip-icon">
                            <img id="cc-brand-icon" src="https://img.icons8.com/color/48/000000/visa.png" class="brand-icon">
                        </div>
                        <div class="cc-number" id="preview-number">•••• •••• •••• ••••</div>
                        <div class="cc-bottom d-flex justify-content-between">
                            <div>
                                <div class="label">Card Holder</div>
                                <div class="value" id="preview-name">Enter Name</div>
                            </div>
                            <div>
                                <div class="label">Expires</div>
                                <div class="value" id="preview-exp">10/27</div>
                            </div>
                        </div>
                    </div>

                    <p class="text-center fs-5">
                        <span class="fw-semibold">Total:</span>
                        <span class="text-success fw-bold">${{ number_format($total, 2) }}</span>
                    </p>

                    {{-- Cardholder name input --}}
                    <div class="mb-3">
                        <label for="cardholder-name" class="form-label fw-semibold">Cardholder Name</label>
                        <input type="text" id="cardholder-name" class="form-control" placeholder="e.g. sadiq ullah" required>
                    </div>

                    <form id="payment-form">
                        <div class="form-group mb-4">
                            <label for="card-element" class="form-label fw-semibold">💳 Card Details</label>
                            <div id="card-element" class="form-control py-3 bg-light rounded"></div>
                        </div>

                        <div class="d-grid">
                            <button id="submit" class="addtocart border-0 py-2 rounded btn-lg shadow-sm">
                                <span id="button-text"><i class="bi bi-shield-check"></i> Payment Now</span>
                                <span id="spinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>

                    <div id="card-errors" class="text-danger text-center mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();

    const card = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                iconColor: '#5c6ac4',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#dc3545',
                iconColor: '#dc3545'
            }
        }
    });

    card.mount('#card-element');

    // Card preview update logic
    const previewNumber = document.getElementById('preview-number');
    const previewExp = document.getElementById('preview-exp');
    const previewName = document.getElementById('preview-name');
    const cardholderInput = document.getElementById('cardholder-name');
    const brandIcon = document.getElementById('card-brand-icon');

    // Live card brand detection
    card.on('change', function(event) {
        // Detect brand
        const brandIcons = {
            visa: 'https://img.icons8.com/color/48/000000/visa.png',
            mastercard: 'https://img.icons8.com/color/48/000000/mastercard.png',
            amex: 'https://img.icons8.com/color/48/000000/amex.png',
            discover: 'https://img.icons8.com/color/48/000000/discover.png',
            default: 'https://img.icons8.com/color/48/000000/bank-card-back-side.png'
        };
        document.getElementById('cc-brand-icon').src = brandIcons[event.brand] || brandIcons.default;

        // Number (last 4 digits)
        if (event.complete && event.value) {
            const clean = event.value.replace(/\s/g, '');
            const masked = '•••• •••• •••• ' + clean.slice(-4);
            document.getElementById('preview-number').textContent = masked;
        }
    });

    document.getElementById('cardholder-name').addEventListener('input', function() {
        document.getElementById('preview-name').textContent = this.value.toUpperCase() || 'JOHN DOE';
    });

    // Cardholder name update
    cardholderInput.addEventListener('input', function() {
        previewName.textContent = this.value.trim().toUpperCase() || 'JOHN DOE';
    });

    // Payment form handling
    const form = document.getElementById('payment-form');
    const submitBtn = document.getElementById('submit');
    const spinner = document.getElementById('spinner');
    const buttonText = document.getElementById('button-text');
    const cardErrors = document.getElementById('card-errors');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        cardErrors.textContent = '';
        buttonText.textContent = 'Processing...';
        spinner.classList.remove('d-none');
        submitBtn.disabled = true;

        const cardholderName = cardholderInput.value;

        const {
            paymentMethod,
            error
        } = await stripe.createPaymentMethod('card', card, {
            billing_details: {
                name: cardholderName
            }
        });

        if (error) {
            cardErrors.textContent = error.message;
            resetButton();
            return;
        }

        const res = await fetch("{{ route('stripe.charge') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                payment_method_id: paymentMethod.id
            })
        });

        const data = await res.json();
        if (data.success) {
            window.location.href = data.redirect_url;
        } else if (data.requires_action) {
            const result = await stripe.confirmCardPayment(data.payment_intent_client_secret);
            if (result.error) {
                cardErrors.textContent = result.error.message;
                resetButton();
            } else {
                window.location.href = "{{ route('checkout.place') }}";
            }
        } else {
            cardErrors.textContent = data.error;
            resetButton();
        }
    });

    function resetButton() {
        buttonText.textContent = 'Pay Now';
        spinner.classList.add('d-none');
        submitBtn.disabled = false;
    }
</script>
@endsection