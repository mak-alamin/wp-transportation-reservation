<?php

/**
 * Plugin Name: Transportation Reservation System
 * Plugin URI: https: //example.com/plugins/the-basics/
 * Description: Handle the basics with this plugin.
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Mak Alamin
 * Author URI:
 * License: GPL v2 or later
 * License URI: https: //www.gnu.org/licenses/gpl-2.0.html
 * Update URI: 
 * Text Domain: wp-transportation-reservation
 * Domain Path: /languages
 */

/**
 * Require Files
 */
require_once __DIR__ . '/enqueue-scripts.php';


add_shortcode('myot_reservation_booking_form', 'generate_myot_reservation_booking_form');
function generate_myot_reservation_booking_form()
{
  ob_start();
  require_once __DIR__ . '/reservation-form.php';

  return ob_get_clean();
}

add_shortcode('myot_reservation_search_form', 'generate_myot_reservation_search_form');

function generate_myot_reservation_search_form()
{
  ob_start();

  require_once __DIR__ . '/styles.php';

  $search_page_id = rbfw_get_option('rbfw_search_page', 'rbfw_basic_gen_settings');
  $search_page_link = 'http://localhost/myot/?page_id=6216#'; // get_page_link($search_page_id);
  $location_arr = rbfw_get_location_arr();
  $location = !empty($_GET['rbfw_search_location']) ? strip_tags($_GET['rbfw_search_location']) : '';
?>
  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Tab1')" id="defaultOpen">From Airport</button>
    <button class="tablinks" onclick="openCity(event, 'Tab2')">To Airport</button>
    <button class="tablinks" onclick="openCity(event, 'Tab3')">By the Hour</button>
  </div>

  <div id="Tab1" class="tabcontent">
    <div class="rbfw_search_form_wrap">
      <h5 style="font-size: 20px !important; margin-top: 20px;">From Airport</h5>
      <form class="rbfw_search_form" action="<?php echo esc_url($search_page_link); ?>" method="GET">
        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Pickup Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_location">
          <option value="">Please Select a Location</option>
                      <option value="Australia">Australia</option>
                      <option value="England">England</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New York City">New York City</option>
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Dropoff Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_droplocation">
          <option value="">Please Select a Location</option>
                      <option value="Australia">Australia</option>
                      <option value="England">England</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New York City">New York City</option>
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label>Start Date</label>
          <input type="date" name="start_date" />
        </div>

        <div class="rbfw_search_form_col">
          <label>End Date <b style="font-size:11px; color:black;">(Optional)</b></label>
          <input type="date" name="end_date" />
        </div>

        <div class="rbfw_search_form_col" style="text-align: center; width:100px;">
          <label>Persons</label>
          <a id="toggleButton" style="border: 1px solid black;padding: 10px;border-radius: 25px;"><i class="fa fa-user" style="font-size: 30px; color:black;position: relative;top: 5px;"></i></a>

          <div class="open-collapse">
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Adults:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="adults" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Children:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="children" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Infants:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="infants" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
          </div>
        </div>

        <div class="rbfw_search_form_col">
          <button type="submit" name="myot_reserve__search_submit" class="myot_search_submit"><?php rbfw_string('rbfw_text_search', __('Search', 'booking-and-rental-manager-for-woocommerce')); ?></button>
        </div>
      </form>
    </div>
  </div>

  <div id="Tab2" class="tabcontent">
    <div class="rbfw_search_form_wrap">
      <h5 style="font-size: 20px !important; margin-top: 20px;">To Airport</h5>
      <form class="rbfw_search_form" action="<?php echo esc_url($search_page_link); ?>" method="GET">
        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Pickup Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_location">
            <option value="">Please Select a Location</option>
            <option value="Australia">Australia</option>
            <option value="England">England</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New York City">New York City</option>
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Dropoff Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_droplocation">
          <option value="">Please Select a Location</option>
                      <option value="Australia">Australia</option>
                      <option value="England">England</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New York City">New York City</option>
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label>Start Date</label>
          <input type="date" name="start_date" />
        </div>

        <div class="rbfw_search_form_col">
          <label>End Date <b style="font-size:11px; color:black;">(Optional)</b></label>
          <input type="date" name="end_date" />
        </div>

        <div class="rbfw_search_form_col" style="text-align: center; width:100px;">
          <label>Persons</label>
          <a id="toggleButton2" style="border: 1px solid black;padding: 10px;border-radius: 25px;"><i class="fa fa-user" style="font-size: 30px; color:black;position: relative;top: 5px;"></i></a>

          <div class="open-collapse2">
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Adults:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="adults" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Children:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="children" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
            <div class="quantity-selector">
              <div class="quantity-label" style="color: black;">Infants:</div>
              <div class="quantity-controls">
                <a class="decrease" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">-</a>
                <input type="number" class="quantity-input" name="infants" value="0" min="0" style="color: black !important; width: 70px;margin: 0px 20px;text-align: center;">
                <a class="increase" style="cursor:pointer; background: #a81f86; color: #fff; padding: 7px 25px;">+</a>
              </div>
            </div>
          </div>

        </div>

        <div class="rbfw_search_form_col">
          <label></label>
          <button type="submit" name="myot_reserve__search_submit" class="myot_search_submit"><?php rbfw_string('rbfw_text_search', __('Search', 'booking-and-rental-manager-for-woocommerce')); ?></button>
        </div>
      </form>
    </div>
  </div>

  <div id="Tab3" class="tabcontent">
    <div class="rbfw_search_form_wrap">
      <h5 style="font-size: 20px !important; margin-top: 20px;">By The Hour</h5>
      <form class="rbfw_search_form" action="<?php echo esc_url($search_page_link); ?>" method="GET">
        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Pickup Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_location">
            <!-- <?php // foreach ($location_arr as $key => $value) { ?>
              <option value="<?php // echo esc_attr($key); ?>"><?php // echo esc_html($value); ?></option>
            <?php // } ?> -->


                      <option value="">Please Select a Location</option>
                      <option value="Australia">Australia</option>
                      <option value="England">England</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New York City">New York City</option>
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label><?php rbfw_string('rbfw_text_pickup_location', __('Dropoff Location', 'booking-and-rental-manager-for-woocommerce')); ?></label>
          <select name="myot_reserve__search_droplocation">
                      <option value="">Please Select a Location</option>
                      <option value="Australia">Australia</option>
                      <option value="England">England</option>
                      <option value="New Jersey">New Jersey</option>
                      <option value="New York City">New York City</option>
           
          </select>
        </div>

        <div class="rbfw_search_form_col">
          <label>Pickup Date</label>
          <input type="date" name="start_date" />
        </div>

        <div class="rbfw_search_form_col">
          <label>Duration</label>
          <select name="duration" class="form-control">
            <option value="">Select the Time</option>
            <?php

            // Define an array of timings

            $timings = array("7:00 AM", "7:30 AM", "8:00 AM", "8:30 AM", "9:00 AM", "9:30 AM", "10:00 AM", "10:30 AM", "11:00 AM", "11:30 AM", "12:00 PM", "12:30 PM", "1:00 PM", "1:30 PM", "2:00 PM", "2:30 PM", "3:00 PM", "3:30 PM", "4:00 PM", "4:30 PM", "5:00 PM", "5:30 PM", "6:00 PM", "6:30 PM", "7:00 PM", "8:30 PM", "9:00 PM", "9:30 PM", "10:00 PM", "10:30 PM", "11:00 PM", "11:30 PM");

            // Use a for loop to generate options for each timing

            for ($i = 0; $i < count($timings); $i++) {

              echo "<option value='$timings[$i]'>$timings[$i]</option>";
            }

            ?>

          </select>

        </div>

        <div class="rbfw_search_form_col">
          <label></label>
          <button type="submit" name="myot_reserve__search_submit" class="myot_search_submit"><?php rbfw_string('rbfw_text_search', __('Search', 'booking-and-rental-manager-for-woocommerce')); ?></button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Function to handle quantity changes
      function updateQuantity(input, delta) {
        var $quantityInput = $(input);
        var currentQuantity = parseInt($quantityInput.val(), 10);
        var newQuantity = currentQuantity + delta;
        if (newQuantity >= 0) {
          $quantityInput.val(newQuantity);
        }
      }

      // Handle plus button clicks
      $('.quantity-controls .increase').click(function() {
        updateQuantity($(this).siblings('.quantity-input'), 1);
      });

      // Handle minus button clicks
      $('.quantity-controls .decrease').click(function() {
        updateQuantity($(this).siblings('.quantity-input'), -1);
      });

      // Handle input changes
      $('.quantity-input').change(function() {
        var newQuantity = parseInt($(this).val(), 10);
        if (isNaN(newQuantity) || newQuantity < 0) {
          $(this).val(0);
        }
      });

      // Toggle the open-collapse div when the button is clicked
      $('#toggleButton').click(function() {
        $('.open-collapse').slideToggle();
      });
      $('#toggleButton2').click(function() {
        $('.open-collapse2').slideToggle();
      });
    });
  </script>

  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>

<?php

  return ob_get_clean();
}
