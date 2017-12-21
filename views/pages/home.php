<div class="container">

    <section> <!-- advert full width -->
        <div class="row">
            <div class="hidden-sm hidden-xs col-lg-4" style="text-align: center">4 colonnes</div>
            <div class="col-lg-4" style="text-align: center">4 colonnes</div>
            <div class="hidden-sm hidden-xs col-lg-4" style="text-align: center">4 colonnes</div>
        </div>
    </section>

    <section style="width: 100%"> <!-- main -->
        <div class="row" id = "mainSection">
            <aside> <!-- left box -->

                    <div class="hidden-xs col-sm-3" style="text-align: center">3 colonnes</div>

            </aside>

            <div class="col-sm-6" style="text-align: center"> <!-- main -->
                <form id="faucetForm" action="?controller=claim&action=claim" method="post">
                    <input id="btcAddress" type="text" name="btcAddress" value="" placeholder="address: ex: 1F91KfeNkPceHHbP4jvmJ2oV3Qay9zMbok">
                    <!-- re-captcha -->
                    <div class="g-recaptcha" data-sitekey="6LfL8hgUAAAAADnVQXqGlz22y1JMcT9uwtxJgA3G"></div>
                    <input type="submit" id="claimButton" value="Get Reward">
                </form>
            </div>
            <aside> <!-- right box -->
                <div class="hidden-xs col-sm-3" style="text-align: center">3 colonnes</div>
            </aside>
        </div>
    </section>

    <footer> <!-- full width bottom -->
        <div class="row">
            <div class="col-lg-12" style="text-align: center">12 colonnes</div>
        </div>
    </footer>
</div>

