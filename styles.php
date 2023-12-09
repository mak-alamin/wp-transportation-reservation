<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #a81f86;
  }

  /* Style the buttons inside the tab */
  .tab button {
    color: white;
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 14px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #6b0a53;
    color: white;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #6b0a53;
    color: white;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
  }

  .rbfw_search_form {
    width: 100%;
  }

  a {
    text-decoration: none;
    color: black;
  }

  .quantity-selector {
    display: flex;
    justify-content: space-between;
  }

  .icon {
    text-align: center;
    margin: 10px;
  }

  .icon-label {
    font-weight: bold;
  }

  .quantity-controls {
    display: flex;
    align-items: center;
    margin-top: 5px;
  }

  button.quantity-decrease,
  button.quantity-increase {
    width: 25px;
    height: 25px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    margin: 0 5px;
  }

  span.quantity {
    width: 30px;
    text-align: center;
  }

  /* Styles for the dropdown popup */

  .dropdown-popup {
    position: relative;
    display: inline-block;
  }

  .open-collapse {
    display: none;
    position: absolute;
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    top: 70%;
    left: 50%;
    z-index: 1;
    padding: 15px;
  }

  .dropdown-popup.active .open-collapse {
    display: block;
  }

  .open-collapse2 {
    display: none;
    position: absolute;
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    top: 70%;
    left: 50%;
    z-index: 1;
    padding: 15px;
  }

  .dropdown-popup.active .open-collapse2 {
    display: block;
  }

  .dropdown-popup a {
    display: block;
  }

  span.quantity {
    width: 30px;
    text-align: center;
  }
  .rbfw_search_form button {
    background: #a81f86;
    color: #fff;
    padding: 10px 30px;
    margin-top: 20px;
}
</style>