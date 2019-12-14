<form action="<?php echo controller('items.controller.php') ?>" method="post">
    <!-- TODO: Implement make an order -->
    <input type="hidden" name="make_order">
    
    <h3> Payment Method </h3>

    <p>

        <input type="radio" name="payment" value="visa" checked="checked" />

        Visa <br />

        <input type="radio" name="payment" value="mc" />

        Master Card <br />

        <input type="radio" name="payment" value="discover" />

        Discover <br />

        <input type="radio" name="payment" value="check" />

        Check <br /> <br />



        <!-- The submit and reset buttons -->


        <input type="submit" value="SUBMIT ORDER" />

    </p>
</form>