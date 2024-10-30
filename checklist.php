<?php
include("./includes/header.php");

?>

<div class="container-fluid featurs">
    <div class="container">

        <div class="row g-4">


            <div class="col-md-12 col-lg-12">

                <div class="featurs-item text-center p-4">

                    <h1>Wedding Checklist</h1>

                    <p class="fw-normal text-dark mb-4">At RingUs, we believe that planning a wedding can be a fun and exciting experience! To help you get started on your journey to "happily ever after," we've created this comprehensive wedding planning checklist.
                        This checklist outlines everything you need to consider, along with the ideal time frame for completing each task.
                        It’s designed for a 12-month planning period, but if you have less time, don’t worry—just start from the beginning and work your way through as quickly as possible.
                        We've also made the checklist customizable, so you can easily add or remove tasks to suit your unique needs.
                        Simply check off each item as you complete it to stay on track. We’ve also set up email notifications so you never miss a deadline.
                    </p>
                </div>
            </div>


        </div>

    </div>
</div>

<div class="container-fluid featurs">
    <div class="container py-5">

        <div class="row g-4">

            <div class="col-md-6 col-lg-2">

            </div>
            <div class="col-md-6 col-lg-8">

                <div id="accordion-container" class="featurs-item text-center rounded bg-light p-4">

                    <div class="w-100 accordion btn bg-white text-primary text-center py-3"><i class="bi bi-arrow-down-circle-fill"></i>12 MONTHS BEFORE THE WEDDING</div>

                    <div class="panel">
                        <p class="text-dark">Congratulations on your engagement! Now, take a moment to enjoy this exciting time.
                        <div class="progress-bar-container">
                            <div class="progress-bar" id="progress-bar">0%</div>
                        </div>
                        <div class="checklist">
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Choose your wedding date.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Envision your wedding style.
                                    - Consider the color scheme, location, theme, timing, and the overall atmosphere you'd like to have.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Sit down and have your first of many guest lists.
                                    Discuss it with your partner, and don't forget to ask your parents for their input. This guest list should include (the must be invited, should be invited and would be nice to invite) you can refine and scale down the list as you go.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Figure out a budget for your wedding. RingUs offers a helpful budget calculator and track sheet to help you stay organized.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Allocate funds to different vendor category (The Ringus budget calculator helps you simplify this process)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Narrow down your venue options.
                                    - Focus on both the ceremony and reception locations based on your vision and preferred area.</label>
                            </div>
                        </div>
                        <!-- Add New Item -->
                        <div class="add-item">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Add new item...">
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" onclick="addItem(this)">Add</button>
                        </div>

                    </div>


                    <!-- 11 Months 2 -->
                    <div class="w-100 accordion btn bg-white text-primary text-center my-3"><i class="bi bi-arrow-down-circle-fill"></i>11 Months </div>
                    <div class="panel">
                        <p class="text-dark">Develop a record keeping system for payments for all vendors</p>
                        <div class="checklist">
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Create a hashtag for your special day. A hashtag will help you document the engagement and actual wedding. It will also engage your friends, family, and guests who are unable to attend your wedding.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>If you would like a wedding crest, research and book a graphics designer to design one for you.
                                    Create a basic website to announce your wedding, send out information to your guests and collect RSVPs.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Research and visit potential venues.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Secure your ceremony and reception venue.</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Understand what is included in the package (catering, rentals, etc.)</label>
                            </div>
                            <div class="checklist-item">
                                <input type="checkbox" class="check-item">
                                <label>Decide who you want as bridesmaids, groomsmen, and other attendants. Ask them formally, giving them plenty of notice.</label>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress-bar-container">
                            <div class="progress-bar">0%</div>
                        </div>

                        <!-- Add New Item -->
                        <div class="add-item">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Add new item...">
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" onclick="addItem(this)">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">

            </div>

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