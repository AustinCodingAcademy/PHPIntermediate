<?php

interface ACAPaymentInterface
{
    public function submitPayment($ccNum, $expYear, $expDate, $cvv);
}

class PayPal implements ACAPaymentInterface
{
    public function submitPayment($ccNum, $expYear, $expDate, $cvv)
    {
        echo 'Paypal payment successful';
    }
}

class Stripe implements ACAPaymentInterface
{
    public function submitPayment($ccNum, $expYear, $expDate, $cvv)
    {
        echo 'Stripe payment successful';
    }
}

class GoogleWallet implements ACAPaymentInterface
{
    public function submitPayment($ccNum, $expYear, $expDate, $cvv)
    {
        echo __CLASS__ . ' payment successful, from method: ' . __FUNCTION__;
    }
}

?>
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
        Select payment option:
        <select name="paymentType">
            <option value="PayPal">PayPal</option>
            <option value="Stripe">Stripe</option>
            <option value="GoogleWallet">GoogleWallet</option>
            <option value="Vendi">Vendi</option>
        </select>

        <input type="submit"/>
    </form>
<?php

if (isset($_POST['paymentType'])) {
    $paymentType = $_POST['paymentType'];
} else {
    $paymentType = null;
}


if (!empty($paymentType) && class_exists($paymentType)) {

//    if ($paymentType == 'Stripe') {
//        $paymentObject = new Stripe();
//    } elseif ($paymentType == 'GoogleWallet') {
//        $paymentObject = new GoogleWallet();
//    }

    $paymentObject = new $paymentType();
    echo '<pre>';
    print_r($paymentObject);


} else {

    echo 'I am empty';
}


function acceptAnyKindOfPayment($allUserInput)
{
    if ($allUserInput['paymentType'] == 'GoogleWallet') {

        // 2000 lines of google wallet API code
    } else {
        if ($allUserInput['paymentType'] == 'Stripe') {
            // 600 lines of stripe code
        }
    }
}