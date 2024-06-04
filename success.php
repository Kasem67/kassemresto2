<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Completed</title>
   <style>
      body {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         background-color: #f2f2f2;
      }

      .check-logo {
         width: 200px;
         height: 200px;
         background-color: #4CAF50;
         border-radius: 50%;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .check-icon {
         width: 120px;
         height: 120px;
         color: white;
      }

      .message {
         margin-top: 20px;
         font-size: 24px;
         color: #333;
         text-align: center;
      }
   </style>
</head>
<body>
   <div class="check-logo">
      <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
         <path d="M9 16.17L5.53 12.7a.996.996 0 1 1 1.41-1.41L9 13.36l7.3-7.29a.996.996 0 1 1 1.41 1.41L9 16.17z"/>
      </svg>
   </div>
   <div class="message">
      Order successfully completed
   </div>
</body>
</html>