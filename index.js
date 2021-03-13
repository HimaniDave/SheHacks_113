const express = require("express");

const app = express();

app.use(express.static("public"));
app.set("view engine", "ejs");


const PORT  = process.env.PORT || 3000;

app.listen(PORT, ()=>{
    console.log(`Server is up and running on port ${PORT}`)
});