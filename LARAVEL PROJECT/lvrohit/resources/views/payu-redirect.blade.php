<!-- aa online paynent form che ane je link che a account ni aapvani je payment recevi kare -->

<form action="https://test.payu.in/_payment" method="post" name="payuForm">
    <input type="hidden" name="key" value="{{ $key }}">
    <input type="hidden" name="txnid" value="{{ $txnid }}">
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="productinfo" value="{{ $productinfo }}">
    <input type="hidden" name="firstname" value="{{ $firstname }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="hidden" name="phone" value="{{ $phone }}">
    <input type="hidden" name="surl" value="{{ route('payu.success') }}">
    <input type="hidden" name="furl" value="{{ route('payu.fail') }}">
    <input type="hidden" name="hash" value="{{ $hash }}">
</form>

<script>
    document.payuForm.submit();
</script>
