<?php
include("./includes/header.php");

?>

<div class="container-fluid featurs">
    <div class="container py-5">

        <div class="row g-4">

            <div class="col-md-6 col-lg-2">

            </div>
            <div class="col-md-6 col-lg-8">

                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="text-start">
                        <h1>Wedding Checklist</h1>
                    </div>
                    <input type="text" class="w-100 form-control border-0 py-3 mb-4" id="itemInput" placeholder="Add a new item...">
                    <!-- <input type="text" id="itemInput" placeholder="Add a new item..."> -->
                    <button id="addButton" class="w-100 btn form-control border-secondary py-3 bg-white text-primary">Add Item</button>
                    <!-- <button id="addButton">Add Item</button> -->
                </div>
            </div>
            <div class="col-md-6 col-lg-2">

            </div>

        </div>
        <div class="row g-4">

            <div class="col-md-6 col-lg-2">

            </div>
            <div class="col-md-6 col-lg-8">
                <div id="checklist" class="featurs-item text-center rounded bg-light p-4">

                </div>
            </div>
            <div class="col-md-6 col-lg-2">

            </div>

        </div>
    </div>
</div>



<ul id="checklist">
    <!-- Checklist items will be added here -->
</ul>

<script>
    // Function to add a new item to the checklist
    function addItem() {
        const input = document.getElementById("itemInput");
        const itemText = input.value.trim();

        if (itemText === "") {
            alert("Please enter a valid item.");
            return;
        }

        const checklist = document.getElementById("checklist");
        const p = document.createElement("p");
        p.textContent = itemText;
        p.className = 'text-primary m-3 px-4';

        // Add a checkbox to mark completion
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.className = "py-3 mb-4";
        checkbox.addEventListener("change", () => {
            p.classList.toggle("completed", checkbox.checked);
        });

        // Add a remove button
        const removeButton = document.createElement("button");
        removeButton.className = 'btn btn-block btn-outline-danger mx-5'
        removeButton.textContent = "Remove";
        removeButton.addEventListener("click", () => {
            checklist.removeChild(p);
        });

        p.prepend(checkbox);
        p.appendChild(removeButton);
        checklist.appendChild(p);

        // Clear the input
        input.value = "";
    }

    // Event listener for the add button
    document.getElementById("addButton").addEventListener("click", addItem);

    // Allow pressing "Enter" to add items
    document.getElementById("itemInput").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            addItem();
        }
    });
</script>

</body>

</html>