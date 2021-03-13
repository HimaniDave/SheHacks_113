const express = require("express");
const router = express.Router();

router.get("/",(req, res) => {
    res.render("home")
});

router.get("/signup",(req, res)=>{
    res.render("masterSignup")
});

router.get("/login",(req, res)=>{
    res.render("masterLogin")
});

router.get("/contact",(req, res)=>{
    res.render("contact")
});

module.exports = router