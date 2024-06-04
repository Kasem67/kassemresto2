
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Contact Form</title>
    <style>
        /*body {
    font-family: 'Arial', sans-serif;
  background-image: url("edit.webp");
  background-repeat: no-repeat;
  background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}*/

.container {
    position: relative;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.5);
    max-width: 700px;
    width: 100%;
    height: 100vh;
    text-align: center;
    margin-left: 800px;
}

h1 {
    color: #333;
}

.form-group {
    margin-bottom: 25px;
    position: relative;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input, textarea {
    width: calc(100% - 20px);
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #f5f5f5;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

input:focus, textarea:focus {
    outline: none;
    background-color: #e0e0e0;
}

button {
    background-color: darkblue;
    color: white;
    padding: 12px 30px;
    font-size: 18px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background-color: #e74c4f;
}
.main{
    position: relative;
}
img{
position: absolute;
top: 0px;
width: 800px;
height: 100vh;

}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
    </style>
</head>
<body>
    <div class="main">
    <div class="container">
        <h1>Add burger</h1>
      <form action="insertplates.php"  method="post" enctype="multipart/form-data">
        <br><br><br><br><br>
            <div class="form-group">
                <label for="name">id:</label>
                <input type="text" name="id4" required>
            </div>
            <div class="form-group">
                <label for="email">name:</label>
                <input type="text"  name="name4" required>
            </div>
            <div class="form-group">
                <label for="message">price:</label>
                <input type="text" name="price4">
            </div>
            <div class="form-group">
                <label for="message">image to upload</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image4" class="box">
            </div>


            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
        <?php if (isset($product_image)) : ?>
    <img src="uploadimg/<?php echo $product_image; ?>" alt="Product Image">
<?php endif; ?>
 
    </div>
    <img src="adp.jpeg" alt="">
    </div>
</body>
</html>
