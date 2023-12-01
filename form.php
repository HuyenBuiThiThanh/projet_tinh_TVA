<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/form.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3" id="cartList">

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong id="total">$0</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append" id="promoCodeBtn">
                            <button type="submit" class="btn btn-secondary" style="height: 100%;" onclick="loading();">Redeem</button>

                        </div>
                    </div>
                </form>
                <!-- Modale d'erreur -->
                <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel">Erreur Système</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Une erreur s'est produite. Veuillez réessayer plus tard.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate="" id="checkoutFormValid">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="height: 100%;">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3" id="bug1">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                                <option>VietN</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="mb-3" id="detailsField" style="display: none;">
                        <label for="details">Details</label>
                        <input type="text" class="form-control" id="details" placeholder="Enter details" required>
                        <div class="invalid-feedback">
                            Details are required.
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" id="checkoutForm" onclick="onFormSubmit(event)">Continue to checkout</button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Inclusion de jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Inclusion de Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        // Fonction pour afficher la modale d'erreur
        function showErrorModal() {
            $('#errorModal').modal('show');
        }
        // document.querySelector('.card.p-2').addEventListener('submit', function(event) {
        //     event.preventDefault(); // Empêche la soumission standard du formulaire
        //     showErrorModal(); // Affiche la modale d'erreur
        // });


        // Fonction pour mettre à jour le total du panier
        function updateTotal(newPrice) {
            var totalItem = document.getElementById('total');
            var currentTotal = totalItem.textContent.replace('$', '');
            var newTotal = parseFloat(currentTotal) + newPrice;
            totalItem.textContent = '$' + newTotal.toFixed(2);
        }

        // Fonction pour ajouter un article au panier
        // Fonction pour ajouter un article au panier
        // Fonction pour ajouter un article au panier
        function addToCart(productName, productDescription, productPrice) {
            var cartList = document.getElementById('cartList');
            var newItem = document.createElement('li');
            newItem.className = 'list-group-item d-flex justify-content-between lh-condensed';
            newItem.innerHTML = `
        <div>
            <h6 class="my-0">${productName}</h6>
            <small class="text-muted">${productDescription}</small>
        </div>
        <span class="text-muted">$${productPrice.toFixed(2)}</span>
    `;

            // Mise à jour du total et affichage de la TVA
            updateTotal(productPrice);
            displayTax();

            // Trouver l'index de la ligne de la TVA
            var taxIndex;
            for (var i = 0; i < cartList.children.length; i++) {
                if (cartList.children[i].id === 'taxItem') {
                    taxIndex = i;
                    break;
                }
            }

            // Insérer le nouvel article après la ligne de la TVA
            if (taxIndex !== undefined) {
                cartList.insertBefore(newItem, cartList.children[taxIndex + 1]);
            } else {
                // S'il n'y a pas de ligne de TVA, ajouter à la fin
                cartList.appendChild(newItem);
            }
        }


        // Fonction pour calculer et afficher la TVA
        function displayTax() {
            var totalItem = document.getElementById('total');
            var currentTotal = parseFloat(totalItem.textContent.replace('$', ''));
            var taxRate = 0.20; // Taux de TVA de 20%
            var taxAmount = currentTotal * taxRate;

            var cartList = document.getElementById('cartList');
            var taxItem = document.getElementById('taxItem'); // Recherche d'un élément existant avec l'id 'taxItem'

            if (taxItem) {
                // Si la ligne de TVA existe, mettre à jour son contenu
                taxItem.innerHTML = `
            <div>
                <h6 class="my-0">Tax (20%)</h6>
            </div>
            <span class="text-muted">$${taxAmount.toFixed(2)}</span>
        `;
            } else {
                // Si elle n'existe pas, créer une nouvelle ligne et l'ajouter
                taxItem = document.createElement('li');
                taxItem.id = 'taxItem'; // Assurez-vous que cet ID est unique
                taxItem.className = 'list-group-item d-flex justify-content-between lh-condensed';
                taxItem.innerHTML = `
            <div>
                <h6 class="my-0">Tax (20%)</h6>
            </div>
            <span class="text-muted">$${taxAmount.toFixed(2)}</span>
        `;
                cartList.appendChild(taxItem);
            }
        }

        // Fonction appelée lors de la soumission du formulaire
        function onFormSubmit(event) {
            var form = document.getElementById('checkoutFormValid'); // Assurez-vous que l'ID est correct

            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated'); // Ajoute la classe pour montrer les erreurs de validation
            } else {
                event.preventDefault(); // Empêche la soumission standard du formulaire

                // Récupération des données du formulaire
                var firstName = document.getElementById('firstName').value;
                var lastName = document.getElementById('lastName').value;
                var productName = firstName + ' ' + lastName; // Exemple de nom de produit
                var productDescription = 'Custom order'; // Description personnalisée
                var productPrice = Math.random() * 100; // Génère un prix aléatoire

                // Ajout de l'article au panier
                addToCart(productName, productDescription, productPrice);
            }
        }
        // Fonction pour lire la valeur d'un cookie
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length == 2) return parts.pop().split(";").shift();
            return null;
        }

        // Fonction pour écrire un cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Compter les rechargements de la page
        function countPageReloads() {
            var reloadCount = parseInt(getCookie("reloadCount")) || 0;
            reloadCount++;
            setCookie("reloadCount", reloadCount, 7);

            // Gérer l'ID du champ 'address'
            var addressField = document.getElementById("address");
            if (addressField && reloadCount % 5 === 0) {
                var newId = 'address' + reloadCount;
                addressField.id = newId;
                setCookie("addressId", newId, 7); // Stocker le nouvel ID dans un cookie
            } else {
                var storedId = getCookie("addressId");
                if (storedId && addressField) {
                    addressField.id = storedId;
                }
            }
        }

        // Appeler la fonction au chargement de la page
        // window.onload = countPageReloads;

        document.getElementById('country').addEventListener('change', function() {
            var selectedCountry = this.value;
            var detailsField = document.getElementById('detailsField');

            // Simuler un bug : le champ ne s'affiche pas toujours comme prévu
            if (selectedCountry === 'United States') {
                detailsField.style.display = 'block';
            } else {
                detailsField.style.display = 'none';
            }
        });


        // Ajout de l'écouteur d'événement de soumission au formulaire
    </script>

    <script>
        function loading() {
            var tempo = document.getElementById("promoCodeBtn").innerHTML = 
            document.getElementById("promoCodeBtn").innerHTML = ""
            document.getElementById("promoCodeBtn").innerHTML = "<div class='loading'></div>"

            setTimeout(() => {
                document.getElementById("promoCodeBtn").innerHTML = tempo 
            }, 2000);


            // document.getElementById("promoCodeBtn").innerHTML = tempo
        }
    </script>

</body>

</html>