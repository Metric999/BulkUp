<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BulkUp - Trainer Meal Plan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-white min-h-screen text-black">

  <!-- Navbar -->
  <header class="bg-[#1f2937] px-6 py-4 flex items-center justify-between shadow-md">
  <div class="text-white text-2xl font-bold">Bulk<span class="text-blue-400">Up</span></div>
    <div class="flex items-center space-x-6">
    <a href="dashboard" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard' ? 'text-blue-500 underline font-semibold' : 'text-white hover:text-gray-300' ?>">Home</a>
  <a href="workout" class="<?= basename($_SERVER['PHP_SELF']) == 'workout' ? 'text-blue-500 underline font-semibold' : 'text-white hover:text-gray-300' ?>">Workout</a>
  <a href="mealplan" class="<?= basename($_SERVER['PHP_SELF']) == 'mealplan' ? 'text-blue-500 underline font-semibold' : 'text-white hover:text-gray-300' ?>">Mealplan</a>
  <a href="trainer_progress.php" class="<?= basename($_SERVER['PHP_SELF']) == 'trainer_progress.php' ? 'text-blue-500 underline font-semibold' : 'text-white hover:text-gray-300' ?>">Progress</a>
      <div class="relative cursor-pointer">

      <!-- Profile Dropdown -->
      <div class="relative">
        <button id="profileBtn" class="text-white text-xl focus:outline-none">👤</button>
        <div id="dropdownMenu" class="absolute right-0 mt-2 hidden bg-gray-700 rounded shadow-md p-4 space-y-2 z-10 w-40">
        <a href="profile_trainer.php" class="flex items-center space-x-2 hover:underline text-white">Profile</a>
          <a href="notif_trainer.php" class="flex items-center space-x-2 hover:underline text-white">Notifications</a>
          <a href="feedback_trainer.php" class="flex items-center space-x-2 hover:underline text-white">Feedback</a>
          <a href="#" class="flex items-center space-x-2 hover:underline text-white">Log Out</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="px-6 py-10 text-white">
    <!-- SVG Icon + Title -->
    <p class="text-xl font-semibold text-black">Trainee</p>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.216 0 4.295.537 6.121 1.49M15 12a3 3 0 10-6 0 3 3 0 006 0z" />
      </svg>
      Trainer
    </div>

    <h2 class="text-2xl font-bold mt-2 flex items-center gap-2 text-black">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
        <path d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h12v2H3v-2z"/>
      </svg>
      Input Meal Plan
    </h2>

    <!-- Trainee Selector -->
    <div class="mt-6">
      <label for="trainee" class="block mb-2 font-semibold">Choose Trainee</label>
      <select id="trainee" name="trainee" class="w-1/2 p-2 rounded bg-gray-800 text-white">
        <option value="1">Trainee 1 - Andre</option>
        <option value="2">Trainee 2 - Alam</option>
        <option value="3">Trainee 3 - Remon</option>
      </select>
    </div>

    <!-- Date Picker -->
    <div class="mt-4">
      <label for="mealDate" class="block mb-2 font-semibold">Select Date</label>
      <input type="date" id="mealDate" name="meal_date" class="w-1/2 p-2 rounded bg-gray-800 text-white">
    </div>

    <!-- Meal Plan Form -->
    <form id="mealForm" action="submit_mealplan.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
      <div class="bg-slate-800 p-6 rounded-xl border-l-8 border-yellow-500 shadow-md">
        <h3 class="text-yellow-300 font-semibold text-lg mb-2">Add Meal</h3>

        <label class="block mb-1">Time</label>
        <input type="time" name="time" class="w-full p-2 rounded bg-gray-700 text-white mb-3" required>

        <label class="block mb-1">Type (e.g., Breakfast)</label>
        <input type="text" name="type" class="w-full p-2 rounded bg-gray-700 text-white mb-3" required>

        <label class="block mb-1">Meal Description</label>
        <input type="text" name="meal" class="w-full p-2 rounded bg-gray-700 text-white mb-3" required>

        <label class="block mb-1">Calories</label>
        <input type="number" name="calories" class="w-full p-2 rounded bg-gray-700 text-white mb-3" required>

        <label class="block mb-1">Note</label>
        <textarea name="note" rows="2" class="w-full p-2 rounded bg-gray-700 text-white mb-3" required></textarea>

        <input type="hidden" name="trainee_id" id="traineeInput" value="1">

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full mt-2">
          ➕ Submit Meal
        </button>
      </div>
    </form>
  </main>

  <!-- Scripts -->
  <script>
    const profileBtn = document.getElementById("profileBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");
    profileBtn.addEventListener("click", () => {
      dropdownMenu.classList.toggle("hidden");
    });

    const traineeSelect = document.getElementById("trainee");
    const traineeInput = document.getElementById("traineeInput");
    traineeSelect.addEventListener("change", function () {
      traineeInput.value = this.value;
    });

    const mealForm = document.getElementById("mealForm");
    const dateInput = document.getElementById("mealDate");

    mealForm.addEventListener("submit", function (e) {
      if (!dateInput.value) {
        e.preventDefault();
        Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: 'Please select a date before submitting!',
          confirmButtonColor: '#f59e0b'
        });
      } else {
        e.preventDefault(); // Remove this if using real backend
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Meal has been submitted.',
          confirmButtonColor: '#10b981'
        });
      }
    });
  </script>

</body>
</html>
