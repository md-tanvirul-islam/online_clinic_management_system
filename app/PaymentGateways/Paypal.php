<?php

    namespace App\PaymentGateways;

    use App\Interfaces\PaymentGatewayInterface;

    class Paypal implements PaymentGatewayInterface
    {
        public function payment()
        {
            return "payment by Paypal";
        }



    }

?>