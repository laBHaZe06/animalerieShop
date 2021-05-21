document.addEventListener("DOMContentLoaded", function () {
    init();
});

function init() {
    var buttonMoreLess = document.querySelectorAll(".product-quantity");
    buttonMoreLess.forEach(function (el) {
        var button = el.querySelectorAll(".button-more-less");
        var buttonLess = button[0];
        var buttonMore = button[1];
        buttonLess.addEventListener("click", function () {
            var input = el.querySelector("input");
            valueInput = input.getAttribute("value");
            if (valueInput >= 1) {
                NewValueInput = valueInput - 1;
                input.setAttribute("value", NewValueInput);
            }
            if (valueInput == 1) {
                lanceMessDelete(el);
            }
        })
        buttonMore.addEventListener("click", function () {
            var input = el.querySelector("input");
            valueInput = input.getAttribute("value");
            if (valueInput >= 0) {
                NewValueInput = parseFloat(valueInput) + 1;
                input.setAttribute("value", NewValueInput);
            }
        })

        function lanceMessDelete(prod) {
            var prodAsupp = prod.parentNode.parentNode;
            setTimeout(function () {
                messDelete(prodAsupp);
            }, 1000)
        }
    })

    var newNode = document.createElement('div');
    newNode.setAttribute("class", "remove-item-success");
    var messageSupp = "<div class='message'><img src='http://preview.vertbaudet.fr/styles/images/checkout/pictos-sablier.png'/><p>Cet article a bien été supprimé</p><button>Annuler</button>";
    newNode.insertAdjacentHTML("afterbegin", messageSupp);

    function messDelete(el) {
        var pictureProd = el.querySelector(".picture");
        var cloneNewNode = newNode.cloneNode(true);
        el.insertBefore(cloneNewNode, pictureProd);
        var buttonAnnuler = el.querySelector(".remove_item_message .message button");

        function waitExistbutton(sel, time) {
            if (sel != null) {
                sel.addEventListener("click", function () {
                    cloneNewNode.remove();
                    var newInput = el.querySelector(".quantity .product-quantity input");
                    newInput.setAttribute("value", "1");
                });
            } else {
                setTimeout(function () {
                    waitExistbutton(buttonAnnuler, 200);
                }, time);
            }
        }
        waitExistbutton(buttonAnnuler, 200);

    }

    var ligneProduct = document.querySelectorAll(".product-item");
    var editPanel = document.querySelector(".edit-panel");
    var layerAction = document.querySelector(".layer-action");
    var closePanel = document.querySelector(".close-panel");
    var submitEdition = document.querySelector(".submit-edition");
    var layerTitle = document.querySelectorAll(".edit-panel  .title");
    var deleteProduct = document.querySelector(".delete-product");
    ligneProduct.forEach(function (el) {
        var buttonLayer = el.querySelector(".button-action");
        buttonLayer.addEventListener("click", function () {
            // title
            layerTitle.forEach(function (elTitle) {
                elTitle.addEventListener("click", function () {
                    var item = elTitle.parentNode;
                    var jsback = item.querySelector(".jsback");
                    var saveChoice = item.querySelector(".save-choice");
                    var choice = item.querySelectorAll(".choice");
                    item.classList.add("item--active");
                    jsback.addEventListener("click", function () {
                        closeTitle(item);
                    });
                    saveChoice.addEventListener("click", function () {
                        closeTitle(item);
                    });
                    choice.forEach(function (elChoice) {
                        elChoice.addEventListener("click", function () {
                            var level1 = elChoice.parentNode;
                            level1.querySelector(".selected").classList.remove("selected");
                            elChoice.querySelector("span").classList.add("selected");
                            changeDonne();
                        })
                    })
                })
            })
            // fin title
            fadeIn(layerAction);
            editPanel.classList.add("active");
            layerAction.addEventListener("click", function () {
                closeLayer(layerAction, editPanel);
            });
            closePanel.addEventListener("click", function () {
                closeLayer(layerAction, editPanel);
            });
            submitEdition.addEventListener("click", function () {
                closeLayer(layerAction, editPanel);
            });
            deleteProduct.addEventListener("click", function () {
                closeLayer(layerAction, editPanel);
                const test = el;
                console.log(test);
                console.log("test");
                // messDelete();
            });
        })
    })
}

function closeTitle(tle) {
    tle.classList.remove("item--active");
}

function closeLayer(bg, layer) {
    fadeOut(bg);
    layer.classList.remove("active");
}

function fadeOut(fadOutEl) {
    fadOutEl.style.opacity = 1;

    (function fade() {
        if ((fadOutEl.style.opacity -= .1) < 0) {
            fadOutEl.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
};

function fadeIn(fadInEl) {
    fadInEl.style.opacity = 0;
    fadInEl.style.display = "block";

    (function fade() {
        var val = parseFloat(fadInEl.style.opacity);
        if (!((val += .1) > 1)) {
            fadInEl.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
};
// colorT.innerText || colorT.textContent
function changeDonne() {
    var color = document.querySelector(".color");
    var taille = document.querySelector(".taille");
    var colorT = color.querySelector(".title span");
    var tailleT = taille.querySelector(".title span");
    var donneeColor = color.querySelector(".level-1 .selected").innerText || color.querySelector(".level-1 .selected").textContent;
    var donneeTaille = taille.querySelector(".level-1 .selected").innerText || taille.querySelector(".level-1 .selected").textContent;
    colorT.innerHTML = donneeColor;
    tailleT.innerHTML = donneeTaille;
}