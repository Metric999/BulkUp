<!DOCTYPE html>
<html>
<head>
  <title>Complete Your Profile - BulkUp</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
    body {
      font-family: 'Poppins';
      margin: 0;
      background: #a01c1c;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    .navbar {
      width: 100%;
      padding: 20px 40px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: transparent;
      z-index: 100;
    }

    .logo {
      font-size: 1.5em;
      font-weight: bold;
      color: white;
    }

    .container {
      margin-top: 100px;
      width: 80%;
      max-width: 1000px;
      background: #a01c1c;
      border-radius: 10px;
      display: flex;
      padding: 40px;
      gap: 40px;
      justify-content: space-between;
    }

    .left-side {
      flex: 1;
      text-align: center;
    }

    .left-side img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid white;
      margin-bottom: 20px;
    }

    .left-side label {
      cursor: pointer;
      display: block;
      color: white;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .right-side {
      flex: 2;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
    }

    button {
      padding: 10px 30px;
      background: #2C2C2C;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 20px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    button:hover{
        background: indigo;
    }

    input[type="file"] {
      display: none;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo">BulkUp</div>
  </nav>

  <div class="container">
    <div class="left-side">
      <label for="photo">
        <img src="uploads/default.png" id="profile-pic" alt="Profile Picture">
        <div>Click to change photo</div>
      </label>
      <input type="file" id="photo" name="photo" accept="image/*" onchange="previewImage(event)">
    </div>

    <div class="right-side">
      <h2 style="text-align:center; margin-bottom: 20px;">Complete Your Profile</h2>
      <form method="POST" action="{{ route('trainer.profile') }}" enctype="multipart/form-data">@csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="dob">Age</label>
          <input type="number" id="dob" name="dob" placeholder="Enter age" required>
        </div>
        <div class="form-group">
          <label for="height">Height (cm)</label>
          <input type="number" id="height" name="height" placeholder="Enter height" required>
        </div>
        <div class="form-group">
          <label for="weight">Weight (kg)</label>
          <input type="number" id="weight" name="weight" placeholder="Enter weight" required>
        </div>
        <div class="form-group">
          <label for="about">About Me</label>
          <input type="text" id="about" name="about" placeholder="">
        </div>
        <button type="submit">Save profile</button>
      </form>
    </div>
  </div>

  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function () {
        var output = document.getElementById('profile-pic');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

</body>
</html>
