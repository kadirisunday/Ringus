<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Checklist with Accordion and Progress Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .accordion {
            cursor: pointer;
            padding: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            text-align: left;
            outline: none;
            font-size: 16px;
            transition: 0.4s;
            margin-top: 10px;
            border-radius: 5px;
        }

        .panel {
            display: none;
            padding: 15px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        .checklist-item {
            display: flex;
            align-items: center;
            margin: 8px 0;
        }

        .checklist-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .checklist-item.checked label {
            text-decoration: line-through;
            color: gray;
        }

        .progress-bar-container {
            background-color: #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
            height: 20px;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background-color: #28a745;
            text-align: center;
            color: white;
            border-radius: 8px;
        }

        .add-item {
            display: flex;
            margin-top: 15px;
        }

        .add-item input[type="text"] {
            flex: 1;
            padding: 5px;
            font-size: 14px;
        }

        .add-item button {
            padding: 6px 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            margin-left: 5px;
        }
    </style>
</head>

<body>

    <h2>Dynamic Checklist with Multiple Accordions and Progress Bars</h2>

    <!-- Accordion and Checklist Templates -->
    <div id="accordion-container">
        <!-- Accordion 1 -->
        <div class="accordion">Checklist 1</div>
        <div class="panel">
            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" class="check-item">
                    <label>Item 1</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" class="check-item">
                    <label>Item 2</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" class="check-item">
                    <label>Item 3</label>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar-container">
                <div class="progress-bar">0%</div>
            </div>

            <!-- Add New Item -->
            <div class="add-item">
                <input type="text" placeholder="Add new item...">
                <button onclick="addItem(this)">Add</button>
            </div>
        </div>

        <!-- Accordion 2 -->
        <div class="accordion">Checklist 2</div>
        <div class="panel">
            <div class="checklist">
                <div class="checklist-item">
                    <input type="checkbox" class="check-item">
                    <label>Task A</label>
                </div>
                <div class="checklist-item">
                    <input type="checkbox" class="check-item">
                    <label>Task B</label>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar-container">
                <div class="progress-bar">0%</div>
            </div>

            <!-- Add New Item -->
            <div class="add-item">
                <input type="text" placeholder="Add new item...">
                <button onclick="addItem(this)">Add</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle accordion panels
        document.querySelectorAll('.accordion').forEach(accordion => {
            accordion.addEventListener('click', function() {
                this.classList.toggle('active');
                const panel = this.nextElementSibling;
                panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Add event listeners for initial checklist items
        document.querySelectorAll('.check-item').forEach(item => {
            item.addEventListener('change', updateProgress);
        });

        // Function to add a new checklist item
        function addItem(button) {
            const panel = button.closest('.panel');
            const checklist = panel.querySelector('.checklist');
            const input = panel.querySelector('.add-item input[type="text"]');
            const itemText = input.value.trim();

            if (itemText) {
                // Create a new checklist item
                const newItem = document.createElement('div');
                newItem.classList.add('checklist-item');
                newItem.innerHTML = `<input type="checkbox" class="check-item"><label>${itemText}</label>`;
                checklist.appendChild(newItem);

                // Add event listener to the new checkbox
                newItem.querySelector('input[type="checkbox"]').addEventListener('change', updateProgress);

                // Clear the input field
                input.value = '';

                // Update progress bar
                updateProgress.call(newItem.querySelector('input[type="checkbox"]'));
            }
        }

        // Function to update the progress bar based on checked items
        function updateProgress() {
            const panel = this.closest('.panel');
            const checkItems = panel.querySelectorAll('.check-item');
            const progressBar = panel.querySelector('.progress-bar');

            let checkedItems = 0;
            checkItems.forEach(item => {
                if (item.checked) {
                    item.parentElement.classList.add('checked');
                    checkedItems++;
                } else {
                    item.parentElement.classList.remove('checked');
                }
            });

            const progressPercentage = Math.round((checkedItems / checkItems.length) * 100);
            progressBar.style.width = `${progressPercentage}%`;
            progressBar.textContent = `${progressPercentage}%`;
        }
    </script>

</body>

</html>