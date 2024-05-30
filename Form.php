<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>

<?php require "view/practial/nav.header.php" ?> 


<body class="bg-gray-100  min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md  mx-auto w-full">
        <h1 class="text-2xl font-bold mb-6 text-center">Course Register Form</h1>
        <form method="post" action="/controller/form.process.php">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Id</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="course" class="block text-gray-700 font-semibold mb-2">Select Course</label>
                <select id="course" name="course" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a course</option>
                    <option value="php">php</option>
                    <option value="Java script">Java script</option>
                    <option value="python">python</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="comments" class="block text-gray-700 font-semibold mb-2">Additional Comments</label>
                <textarea id="comments" name="comments" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" name = "Register" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="btn">Register</button>
            </div>
        </form>
    </div>

</body>
</html>