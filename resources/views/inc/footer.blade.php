<!-- Footer section -->
<footer id="footer" class="pt-200 navbar_color">
        <div class="container">
             <!-- title -->
        <div class="row">
                <div class="col text-center">
            <h3 class="text-uppercase text-white mb-0">
                <strong>Kaelo Technical and Vocational College</strong>
            </h3>
            <div class="title-underline"></div>
                <p class="mt-2 text-capitalize text-white">Motto: Innovation for a better future</p>
            
                </div>
            </div>
            <!-- end of section title -->
            <div class="row">
                <div class="col text-center">
                    <a href="https://www.kuccps.net/" class="btn">
                     KUCCPS
                    </a>
                    <a href="https://www.helb.co.ke" class="btn" >
                           HELB
                        </a>
                        <a href="https://www.ghris.go.ke" class="btn">
                               GHRIS
                            </a>
                </div>
            </div>
            {{-- Copyright --}}
            <div class="row text-secondary justify-content-center align-items-center">
                &copy; <?php
                $copyYear = 2020; // Set your website start date
                $curYear = date('Y'); // Keeps the second year updated
                echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
                ?> Kaelo Technical and Vocational College | All Rights Reserved. 
              <a href="https://www.techjibu.co.ke" target="_blank"> <img src="/storage/frontend/techjibu.jpg"  class="techjibu_image" alt="Techjibu Ltd"></a> 
             
            </div>
        </div>
    </footer>
    <!-- End of footer section -->