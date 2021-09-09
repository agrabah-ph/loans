<div class="ibox">
    <div class="ibox-heading">
        <h4 class="ibox-title">Payment Methods</h4>
    </div>
    <div class="ibox-content">
        <table class="table">
            <tbody>
            <tr>
                <td width="50%">Agrabah Pay via Gcash account <br>Joselito Ocol <br>09156819270</td>
                <td>{{settings('agrabah_pay')}}</td>
            </tr>
            <tr>
                <td width="50%">GCash</td>
                <td>{{settings('loan_payment_gcash')}}</td>
            </tr>
            <tr>
                <td>BPI</td>
                <td>{{settings('loan_payment_bank_bpi')}}</td>
            </tr>
            <tr>
                <td>Palawan</td>
                <td>{{settings('loan_payment_palawan')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
