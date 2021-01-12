<?php

    namespace App\PaymentGateways;

    use App\Interfaces\PaymentGatewayInterface;

    class Stripe implements PaymentGatewayInterface
    {
        public function payment()
        {
            return "payment by Stripe";
        }



        
    }

?>