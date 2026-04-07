<?php
$success = isset($_GET['success']) ? $_GET['success'] : '';
$error   = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Piramal Style Header + Auto Hero Slider</title>

  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --nav-bg:#0f4f72;
      --text:#fff;
      --muted:rgba(255,255,255,.88);
      --accent:#ff7a18;
      --max:1200px;
      --radius:14px;
      --shadow:0 10px 30px rgba(0,0,0,.12);
    }

    *{box-sizing:border-box}

    body{
      margin:0;
      font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:#111;
      background:#fff;
    }

    body.modal-open{
      overflow:hidden;
    }

    .alert{
      max-width:1200px;
      margin:15px auto 0;
      padding:14px 18px;
      border-radius:10px;
      font-weight:600;
    }

    .alert-success{
      background:#d1fae5;
      color:#065f46;
      border:1px solid #10b981;
    }

    .alert-error{
      background:#fee2e2;
      color:#991b1b;
      border:1px solid #ef4444;
    }

    /* ================= NAVBAR ================= */
    .nav{
      background:var(--nav-bg);
      color:var(--text);
      position:sticky;
      top:0;
      z-index:999;
    }

    .nav__inner{
      max-width:var(--max);
      margin:0 auto;
      display:flex;
      align-items:center;
      gap:18px;
      padding:16px;
    }

    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      text-decoration:none;
      color:var(--text);
      flex:0 0 auto;
      min-width:180px;
    }

    .brand img{
      height:36px;
      width:auto;
      display:block;
    }

    .menu{
      flex:1 1 auto;
      display:flex;
      justify-content:center;
    }

    .menu__list{
      list-style:none;
      margin:0;
      padding:0;
      display:flex;
      align-items:center;
      gap:22px;
      white-space:nowrap;
      overflow:hidden;
    }

    .menu__item{position:relative}

    .menu__link,
    .menu__btn{
      background:none;
      border:0;
      color:var(--text);
      font-weight:700;
      font-size:15px;
      cursor:pointer;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 6px;
    }

    .menu__link:hover,
    .menu__btn:hover{opacity:.9}

    .caret{
      width:8px;
      height:8px;
      border-right:2px solid rgba(255,255,255,.9);
      border-bottom:2px solid rgba(255,255,255,.9);
      transform:rotate(45deg);
      margin-top:-2px;
    }

    .badge{
      font-size:11px;
      font-weight:800;
      padding:2px 7px;
      border-radius:999px;
      background:#22c55e;
      color:#fff;
      margin-left:4px;
    }

    .dropdown{
      position:absolute;
      top:100%;
      left:0;
      min-width:220px;
      background:#fff;
      color:#111;
      border-radius:14px;
      box-shadow:var(--shadow);
      padding:10px;
      display:none;
      z-index:99;
    }

    .dropdown a{
      display:block;
      padding:10px 12px;
      text-decoration:none;
      color:#111;
      border-radius:10px;
      font-weight:600;
      font-size:14px;
    }

    .dropdown a:hover{background:#f3f4f6}
    .has-dd:hover .dropdown{display:block}

    .nav__right{
      flex:0 0 auto;
      display:flex;
      align-items:center;
      gap:10px;
    }

    .login{
      background:var(--accent);
      color:#fff;
      border:0;
      padding:10px 16px;
      border-radius:12px;
      font-weight:800;
      cursor:pointer;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      gap:8px;
    }

    .login:active{transform:translateY(1px)}

    .userIcon{
      width:16px;
      height:16px;
      border:2px solid #fff;
      border-radius:50%;
      position:relative;
      display:inline-block;
    }

    .userIcon:after{
      content:"";
      position:absolute;
      width:10px;
      height:6px;
      border:2px solid #fff;
      border-top:0;
      border-radius:0 0 10px 10px;
      left:50%;
      transform:translateX(-50%);
      bottom:-7px;
      background:transparent;
    }

    .burger{
      display:none;
      width:42px;
      height:42px;
      border:1px solid rgba(255,255,255,.25);
      border-radius:12px;
      background:transparent;
      cursor:pointer;
      align-items:center;
      justify-content:center;
      gap:5px;
      flex-direction:column;
    }

    .burger span{
      width:20px;
      height:2px;
      background:#fff;
      border-radius:2px;
    }

    /* ================= HERO SLIDER ================= */
    .hero-slider{
      position:relative;
      overflow:hidden;
      min-height:500px;
      border-bottom:1px solid rgba(0,0,0,.06);
    }

    .slide{
      position:absolute;
      inset:0;
      opacity:0;
      visibility:hidden;
      transition:opacity 0.9s ease, visibility 0.9s ease;
      background-size:cover;
      background-position:center;
      background-repeat:no-repeat;
    }

    .slide.active{
      opacity:1;
      visibility:visible;
      z-index:1;
    }

    .slide::before{
      content:"";
      position:absolute;
      inset:0;
      background:rgba(223,243,232,.62);
      z-index:1;
    }

    .slide__wrap{
      position:relative;
      z-index:2;
      max-width:var(--max);
      margin:0 auto;
      padding:40px 16px;
      display:grid;
      grid-template-columns:1.1fr .9fr;
      align-items:center;
      gap:24px;
      min-height:500px;
    }

    .hero__left{
      max-width:560px;
    }

    .hero__kicker{
      font-size:42px;
      line-height:1.15;
      margin:0 0 12px;
      font-weight:800;
      color:#0b0f19;
    }

    .hero__kicker span{
      display:block;
      color:#1f7a44;
      margin-top:8px;
      font-weight:800;
      font-size:0.9em;
      line-height:1.2;
    }

    .hero__btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      padding:12px 20px;
      background:#ff6a3d;
      color:#fff;
      font-weight:800;
      border-radius:12px;
      text-decoration:none;
      border:0;
      cursor:pointer;
      margin-top:14px;
      width:max-content;
      transition:0.3s ease;
      font-size:15px;
    }

    .hero__btn:hover{
      background:#e85a2f;
    }

    .hero__art{
      display:flex;
      justify-content:flex-end;
      align-items:flex-end;
    }

    .hero__art img{
      max-width:100%;
      height:auto;
      display:block;
      max-height:360px;
      object-fit:contain;
    }

    .slider-dots{
      position:absolute;
      left:50%;
      bottom:18px;
      transform:translateX(-50%);
      display:flex;
      gap:10px;
      z-index:5;
      flex-wrap:wrap;
      justify-content:center;
      width:100%;
      padding:0 12px;
    }

    .dot{
      width:11px;
      height:11px;
      border-radius:50%;
      border:none;
      background:rgba(255,255,255,0.7);
      cursor:pointer;
      transition:0.3s ease;
      padding:0;
    }

    .dot.active{
      background:#ff6a3d;
      transform:scale(1.15);
    }

    /* ================= LOAN SECTION ================= */
    .loan-section{
      width:100%;
      padding:40px 20px 50px;
      background:#f8fafc;
    }

    .loan-container{
      max-width:1200px;
      margin:0 auto;
    }

    .loan-title{
      font-size:34px;
      font-weight:800;
      color:#000;
      margin-bottom:30px;
      text-align:center;
    }

    .loan-grid{
      display:grid;
      grid-template-columns:repeat(3, 1fr);
      gap:22px;
    }

    .loan-card{
      background:#fff;
      border-radius:16px;
      padding:18px 20px;
      min-height:110px;
      display:flex;
      align-items:center;
      gap:16px;
      box-shadow:0 4px 10px rgba(0,0,0,0.04);
      transition:all 0.25s ease;
      cursor:pointer;
      border:1px solid transparent;
    }

    .loan-card:hover{
      transform:translateY(-4px);
      box-shadow:0 10px 25px rgba(0,0,0,0.08);
      border-color:#dbe4ea;
    }

    .loan-icon-wrap{
      width:62px;
      height:62px;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      flex-shrink:0;
    }

    .loan-icon{
      width:66px;
      height:66px;
      object-fit:contain;
      display:block;
    }

    .loan-text{
      font-size:18px;
      font-weight:700;
      color:#1b2634;
      line-height:1.35;
    }

    /* ================= MODAL FORM ================= */
    .loan-modal{
      position:fixed;
      inset:0;
      background:rgba(11, 34, 57, 0.76);
      display:none;
      align-items:center;
      justify-content:center;
      padding:20px;
      z-index:2000;
    }

    .loan-modal.show{
      display:flex;
    }

    .loan-popup{
      width:100%;
      max-width:600px;
      max-height:90vh;
      overflow-y:auto;
      background:#f5efe8;
      border-radius:16px;
      padding:28px 34px 32px;
      position:relative;
      box-shadow:0 10px 35px rgba(0,0,0,0.18);
    }

    .close-btn{
      position:absolute;
      top:20px;
      right:22px;
      width:28px;
      height:28px;
      border:none;
      border-radius:50%;
      background:#b8bcc0;
      color:#fff;
      font-size:18px;
      line-height:28px;
      cursor:pointer;
    }

    .form-header{
      display:flex;
      align-items:center;
      gap:16px;
      margin-bottom:28px;
    }

    .icon-box{
      width:36px;
      height:36px;
      border-radius:50%;
      background:#f26b3d;
      color:#fff;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:26px;
      font-weight:bold;
      flex-shrink:0;
    }

    .form-header h2{
      font-size:24px;
      color:#2f2f2f;
      font-weight:700;
      margin:0;
    }

    .form-grid{
      display:grid;
      grid-template-columns:repeat(2, 1fr);
      gap:30px 34px;
    }

    .form-group{
      width:100%;
    }

    .form-group label{
      display:block;
      font-size:16px;
      color:#35516e;
      margin-bottom:10px;
      font-weight:500;
    }

    .required{
      color:#ff5a4f;
    }

    .input-wrap{
      position:relative;
    }

    .form-control{
      width:100%;
      border:none;
      border-bottom:1.5px solid #9e9e9e;
      background:transparent;
      padding:8px 35px 10px 2px;
      font-size:16px;
      color:#333;
      outline:none;
      border-radius:0;
    }

    .form-control::placeholder{
      color:#aab3bc;
    }

    select.form-control{
      appearance:none;
      -webkit-appearance:none;
      -moz-appearance:none;
      color:#333;
      cursor:pointer;
    }

    .arrow{
      position:absolute;
      right:8px;
      top:50%;
      transform:translateY(-50%);
      pointer-events:none;
      font-size:16px;
      color:#4f667c;
    }

    .full-width{
      grid-column:1 / -1;
    }

    .employment-title{
      font-size:16px;
      color:#35516e;
      margin-bottom:14px;
      font-weight:500;
    }

    .employment-options{
      display:grid;
      grid-template-columns:repeat(2, 1fr);
      gap:24px;
    }

    .radio-card{
      position:relative;
    }

    .radio-card input{
      display:none;
    }

    .radio-label{
      border:1.5px solid #b8c1ca;
      border-radius:16px;
      height:58px;
      padding:0 22px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      cursor:pointer;
      background:transparent;
      transition:all 0.25s ease;
    }

    .radio-left{
      display:flex;
      align-items:center;
      gap:12px;
      font-size:18px;
      font-weight:600;
      color:#2d2d2d;
    }

    .radio-dot{
      width:24px;
      height:24px;
      border:1.8px solid #222;
      border-radius:50%;
      position:relative;
      flex-shrink:0;
      background:#fff;
    }

    .radio-icon{
      font-size:22px;
      color:#9c9c9c;
    }

    .radio-card input:checked + .radio-label{
      border-color:#f26b3d;
      color:#f26b3d;
    }

    .radio-card input:checked + .radio-label .radio-left{
      color:#f26b3d;
    }

    .radio-card input:checked + .radio-label .radio-dot{
      border-color:#f26b3d;
    }

    .radio-card input:checked + .radio-label .radio-dot::after{
      content:"";
      width:12px;
      height:12px;
      border-radius:50%;
      background:#f26b3d;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
    }

    .radio-card input:checked + .radio-label .radio-icon{
      color:#f26b3d;
    }

    .checkbox-row{
      display:flex;
      align-items:center;
      justify-content:center;
      gap:12px;
      margin:34px 0 26px;
      flex-wrap:wrap;
      color:#333;
      font-size:16px;
    }

    .checkbox-row input{
      width:22px;
      height:22px;
      accent-color:#f26b3d;
      cursor:pointer;
    }

    .checkbox-row a{
      color:#444;
      text-decoration:underline;
    }

    .submit-btn{
      width:100%;
      border:none;
      background:#f3b6a8;
      color:#fff;
      height:54px;
      border-radius:10px;
      font-size:18px;
      font-weight:700;
      cursor:pointer;
      transition:0.3s ease;
    }

    .submit-btn:hover{
      background:#eea693;
    }

    /* ================= CALCULATOR SECTION ================= */
    .calculator-section{
      width:100%;
      padding:30px 20px 50px;
      background:#efefef;
    }

    .calculator-container{
      max-width:1100px;
      margin:auto;
    }

    .calculator-title{
      font-size:36px;
      font-weight:800;
      margin-bottom:10px;
      color:#000;
    }

    .calculator-subtitle{
      font-size:20px;
      color:#5b6672;
      margin-bottom:28px;
      line-height:1.5;
    }

    .calculator-grid{
      display:grid;
      grid-template-columns:repeat(2,1fr);
      gap:20px;
    }

    .calculator-card{
      position:relative;
      height:170px;
      border-radius:18px;
      overflow:hidden;
      display:flex;
      align-items:center;
      padding:22px 24px;
      text-decoration:none;
      color:#fff;
      background-size:cover;
      background-position:center;
      background-repeat:no-repeat;
      isolation:isolate;
    }

    .calculator-card::before{
      content:"";
      position:absolute;
      inset:0;
      background:linear-gradient(90deg, rgba(111,50,28,0.65) 0%, rgba(111,50,28,0.35) 45%, rgba(111,50,28,0.10) 100%);
      z-index:1;
    }

    .calculator-content{
      position:relative;
      z-index:2;
    }

    .calculator-card h3{
      font-size:24px;
      margin-bottom:18px;
      font-weight:800;
      color:#fff;
    }

    .try-btn{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      padding:10px 18px;
      background:#f76b3f;
      border-radius:10px;
      font-size:16px;
      font-weight:700;
      color:#fff;
      border:none;
      cursor:pointer;
      text-decoration:none;
      transition:0.3s ease;
    }

    .try-btn:hover{
      background:#ea5f34;
    }

    .emi-card{
      background-image:url("img/cal-1.png");
    }

    .eligibility-card{
      background-image:url("img/cal-2.png");
    }

    /* ================= RD MODAL ================= */
    .rd-modal{
      position:fixed;
      inset:0;
      background:rgba(0,0,0,0.45);
      display:none;
      align-items:center;
      justify-content:center;
      z-index:3000;
      padding:20px;
    }

    .rd-modal.show{
      display:flex;
    }

    .rd-modal-box{
      width:100%;
      max-width:1180px;
      max-height:95vh;
      overflow-y:auto;
      background:#fff;
      border-radius:14px;
      padding:22px;
      position:relative;
      box-shadow:0 20px 50px rgba(0,0,0,.18);
    }

    .rd-close-btn{
      position:absolute;
      top:14px;
      right:18px;
      width:42px;
      height:42px;
      border:none;
      background:#f1f1f1;
      border-radius:50%;
      font-size:28px;
      line-height:1;
      cursor:pointer;
      color:#333;
      z-index:2;
    }

    .rd-calculator-box{
      background:#fff;
      border:1px solid #e7e7e7;
      border-radius:12px;
      padding:35px;
      display:grid;
      grid-template-columns:1.25fr 0.9fr;
      gap:40px;
    }

    .rd-left,
    .rd-right{
      width:100%;
    }

    .rd-title{
      font-size:32px;
      font-weight:700;
      color:#1f2d4d;
      margin-bottom:8px;
    }

    .rd-subtitle{
      font-size:15px;
      color:#6b7280;
      margin-bottom:30px;
    }

    .rd-field{
      margin-bottom:34px;
    }

    .rd-field-top{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:16px;
      margin-bottom:14px;
    }

    .rd-field-top label{
      font-size:18px;
      color:#22335b;
      font-weight:500;
    }

    .years-text{
      color:#0fb784;
      font-weight:600;
    }

    .rd-value-box{
      min-width:125px;
      background:#e9f7f1;
      border-radius:4px;
      padding:10px 14px;
      display:flex;
      align-items:center;
      justify-content:flex-end;
      gap:6px;
      color:#0fb784;
      font-size:18px;
      font-weight:700;
    }

    .rd-value-box input{
      width:100%;
      border:none;
      outline:none;
      background:transparent;
      text-align:right;
      color:#0fb784;
      font-size:18px;
      font-weight:600;
    }

    .rd-value-box input::-webkit-outer-spin-button,
    .rd-value-box input::-webkit-inner-spin-button{
      -webkit-appearance:none;
      margin:0;
    }

    .rd-value-box input[type=number]{
      appearance:textfield;
      -moz-appearance:textfield;
    }

    .rd-field input[type="range"]{
      width:100%;
      height:4px;
      border-radius:10px;
      appearance:none;
      -webkit-appearance:none;
      background:linear-gradient(to right, #11b886 0%, #11b886 30%, #e6e6ea 30%, #e6e6ea 100%);
      outline:none;
    }

    .rd-field input[type="range"]::-webkit-slider-thumb{
      appearance:none;
      -webkit-appearance:none;
      width:22px;
      height:22px;
      border-radius:50%;
      background:#efefef;
      box-shadow:0 1px 6px rgba(0,0,0,0.18);
      cursor:pointer;
    }

    .rd-field input[type="range"]::-moz-range-thumb{
      width:22px;
      height:22px;
      border:none;
      border-radius:50%;
      background:#efefef;
      box-shadow:0 1px 6px rgba(0,0,0,0.18);
      cursor:pointer;
    }

    .rd-results{
      margin-top:18px;
      max-width:520px;
    }

    .rd-result-row{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:18px;
      padding:12px 0;
      font-size:18px;
      color:#6b7280;
    }

    .rd-result-row strong{
      color:#1e2a4a;
      font-size:18px;
      font-weight:700;
    }

    .rd-right{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:flex-start;
      padding-top:35px;
    }

    .rd-legend{
      width:100%;
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:20px;
      flex-wrap:wrap;
      margin-bottom:26px;
    }

    .legend-item{
      display:flex;
      align-items:center;
      gap:8px;
      color:#6b7280;
      font-size:15px;
    }

    .legend-color{
      width:24px;
      height:10px;
      border-radius:10px;
      display:inline-block;
    }

    .invested-color{
      background:#dfe2f0;
    }

    .return-color{
      background:#5568ef;
    }

    .rd-chart-wrap{
      display:flex;
      justify-content:center;
      align-items:center;
      margin:8px 0 35px;
    }

    .rd-chart{
      width:250px;
      height:250px;
      border-radius:50%;
      background:conic-gradient(#5568ef 0deg 35deg, #dfe2f0 35deg 360deg);
      position:relative;
      transition:0.3s ease;
    }

    .rd-chart-inner{
      width:156px;
      height:156px;
      background:#fff;
      border-radius:50%;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
    }

    .rd-btn{
      background:#10b981;
      color:#fff;
      border:none;
      padding:15px 28px;
      border-radius:10px;
      font-size:24px;
      font-weight:700;
      cursor:pointer;
    }

    /* ================= PIRAMAL GROUP ================= */
    .piramal-section{
      width:100%;
      padding:60px 20px 0;
      background:#f3f3f3;
    }

    .container{
      max-width:1000px;
      margin:0 auto;
      text-align:center;
    }

    .section-title{
      font-size:34px;
      font-weight:800;
      color:#000;
      line-height:1.2;
      margin-bottom:18px;
    }

    .section-subtitle{
      font-size:28px;
      color:#333;
      margin-bottom:-60px;
      font-weight:400;
      margin-bottom:20px;
    }

    .stats-grid{
      display:grid;
      grid-template-columns:repeat(4, 1fr);
      gap:30px;
      align-items:start;
      justify-content:center;
      margin-top:0;
      margin-bottom:70px;
    }

    .stat-card{
      text-align:center;
      padding:10px 15px;
    }

    .icon-circle{
      width:110px;
      height:110px;
      border-radius:50%;
      margin:0 auto 24px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:48px;
      color:#ef6b3c;
    }

    .stat-label{
      font-size:22px;
      color:#1d2d44;
      margin-bottom:18px;
      line-height:1.3;
      font-weight:300;
    }

    .stat-value{
      font-size:22px;
      color:#1d2d44;
      font-weight:500;
      line-height:1.3;
    }

    .cta-btn{
      display:inline-block;
      background:#ef6b3c;
      color:#fff;
      text-decoration:none;
      padding:20px 16px;
      border-radius:14px;
      font-size:14px;
      font-weight:700;
      transition:0.3s ease;
      margin-bottom:40px;
    }

    .cta-btn:hover{
      background:#db5b2e;
    }

    .stat-img{
      width:60px;
      height:auto;
      margin:10px auto;
      display:block;
    }

    @media (max-width: 1000px){
      .menu{justify-content:flex-start}
      .menu__list{gap:14px}
      .brand{min-width:160px}

      .loan-grid{
        grid-template-columns:repeat(2, 1fr);
      }
    }

    @media (max-width: 991px){
      .section-title{
        font-size:42px;
      }

      .section-subtitle{
        font-size:24px;
        margin-bottom:20px;
      }

      .stats-grid{
        grid-template-columns:repeat(2, 1fr);
        gap:40px 20px;
        margin-bottom:55px;
      }

      .stat-label{
        font-size:24px;
      }

      .stat-value{
        font-size:28px;
      }

      .icon-circle{
        width:95px;
        height:95px;
        font-size:40px;
      }

      .rd-calculator-box{
        grid-template-columns:1fr;
        gap:30px;
      }

      .rd-right{
        padding-top:0;
      }

      .rd-legend{
        justify-content:center;
      }
    }

    @media (max-width: 900px){
      .burger{display:flex}

      .menu{
        position:fixed;
        top:70px;
        left:0;
        right:0;
        background:var(--nav-bg);
        display:none;
        padding:14px 16px 18px;
      }

      .menu.is-open{display:block}

      .menu__list{
        flex-direction:column;
        align-items:stretch;
        gap:8px;
        white-space:normal;
      }

      .menu__item{
        border:1px solid rgba(255,255,255,.14);
        border-radius:14px;
        overflow:hidden;
      }

      .menu__link,
      .menu__btn{
        width:100%;
        justify-content:space-between;
        padding:12px 14px;
      }

      .has-dd:hover .dropdown{display:none}

      .dropdown{
        position:static;
        display:none;
        background:rgba(255,255,255,.08);
        box-shadow:none;
        padding:8px;
        border-radius:0;
      }

      .dropdown a{
        color:#fff;
        background:rgba(255,255,255,.08);
        margin:6px 0;
      }

      .dropdown a:hover{
        background:rgba(255,255,255,.14);
      }

      .menu__item.open .dropdown{display:block}

      .hero-slider{
        min-height:580px;
      }

      .slide__wrap{
        grid-template-columns:1fr;
        min-height:580px;
        padding:34px 16px 60px;
        text-align:center;
      }

      .hero__left{
        margin:0 auto;
        max-width:100%;
      }

      .hero__art{
        justify-content:center;
      }

      .hero__kicker{
        font-size:34px;
      }

      .hero__btn{
        margin-left:auto;
        margin-right:auto;
      }

      .hero__art img{
        max-height:280px;
      }
    }

    @media (max-width: 768px){
      .loan-popup{
        padding:22px 18px 24px;
      }

      .form-header h2{
        font-size:21px;
      }

      .form-grid{
        grid-template-columns:1fr;
        gap:24px;
      }

      .employment-options{
        grid-template-columns:1fr;
        gap:16px;
      }

      .radio-label{
        height:56px;
        padding:0 16px;
      }

      .radio-left{
        font-size:16px;
      }

      .checkbox-row{
        justify-content:flex-start;
        margin:28px 0 22px;
      }

      .calculator-grid{
        grid-template-columns:1fr;
      }

      .calculator-card{
        height:150px;
        padding:20px;
      }

      .calculator-card h3{
        font-size:20px;
      }

      .try-btn{
        font-size:14px;
        padding:8px 16px;
      }
    }

    @media (max-width: 600px){
      .hero-slider{
        min-height:520px;
      }

      .slide__wrap{
        min-height:520px;
        padding:28px 14px 58px;
        gap:18px;
      }

      .hero__kicker{
        font-size:28px;
        line-height:1.2;
      }

      .hero__kicker span{
        font-size:0.88em;
      }

      .hero__btn{
        padding:11px 18px;
        font-size:14px;
      }

      .hero__art img{
        max-height:220px;
      }

      .login{
        padding:9px 12px;
        border-radius:10px;
      }

      .slider-dots{
        bottom:14px;
        gap:8px;
      }

      .dot{
        width:10px;
        height:10px;
      }

      .loan-title{
        font-size:28px;
      }

      .loan-grid{
        grid-template-columns:1fr;
      }

      .loan-text{
        font-size:16px;
      }
    }

    @media (max-width: 575px){
      .piramal-section{
        padding:40px 15px 0;
      }

      .section-title{
        font-size:30px;
        line-height:1.3;
        margin-bottom:10px;
      }

      .section-subtitle{
        font-size:18px;
        margin-bottom:5px;
      }

      .stats-grid{
        grid-template-columns:1fr;
        gap:30px;
        margin-top:0;
        margin-bottom:40px;
      }

      .icon-circle{
        width:85px;
        height:85px;
        font-size:34px;
        margin-bottom:18px;
      }

      .stat-label{
        font-size:22px;
        margin-bottom:10px;
      }

      .stat-value{
        font-size:24px;
      }

      .cta-btn{
        width:80%;
        max-width:300px;
        padding:18px 20px;
        font-size:18px;
        border-radius:12px;
      }

      .rd-modal-box{
        padding:14px;
      }

      .rd-calculator-box{
        padding:18px 14px;
        gap:24px;
      }

      .rd-title{
        font-size:26px;
      }

      .rd-subtitle{
        font-size:14px;
        margin-bottom:22px;
      }

      .rd-field{
        margin-bottom:26px;
      }

      .rd-field-top{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
      }

      .rd-field-top label{
        font-size:16px;
      }

      .rd-value-box{
        width:100%;
        min-width:100%;
        font-size:16px;
      }

      .rd-value-box input{
        font-size:16px;
      }

      .rd-result-row{
        font-size:15px;
      }

      .rd-result-row strong{
        font-size:15px;
      }

      .rd-chart{
        width:210px;
        height:210px;
      }

      .rd-chart-inner{
        width:126px;
        height:126px;
      }

      .rd-btn{
        width:100%;
        font-size:18px;
        padding:14px 18px;
      }

      .rd-legend{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
      }
    }

    @media (max-width: 420px){
      .nav__inner{
        padding:12px;
      }

      .brand img{
        height:30px;
      }

      .hero-slider{
        min-height:500px;
      }

      .slide__wrap{
        min-height:500px;
      }

      .hero__kicker{
        font-size:24px;
      }

      .hero__art img{
        max-height:190px;
      }

      .hero__btn{
        width:100%;
        max-width:220px;
      }

      .loan-popup{
        padding:20px 14px 20px;
      }
    }



/*media section*/
.media-section{
  width:100%;
  background:#efefef;
  padding:45px 20px 50px;
}

.media-container{
  max-width:1200px;
  margin:0 auto;
  text-align:center;
}

.media-title{
  font-size:22px;
  font-weight:500;
  color:#4b5563;
  margin:0 0 38px;
}

.media-logos{
  display:grid;
  grid-template-columns:repeat(3, 1fr);
  align-items:center;
  gap:40px;
}

.media-logo{
  display:flex;
  align-items:center;
  justify-content:center;
  min-height:80px;
}

.media-logo img{
  max-width:100%;
  height:auto;
  max-height:48px;
  object-fit:contain;
  display:block;
}

/* Tablet */
@media (max-width: 991px){
  .media-section{
    padding:40px 18px 45px;
  }

  .media-title{
    font-size:20px;
    margin-bottom:30px;
  }

  .media-logos{
    gap:28px;
  }

  .media-logo img{
    max-height:40px;
  }
}

/* Mobile */
@media (max-width: 575px){
  .media-section{
    padding:32px 15px 38px;
  }

  .media-title{
    font-size:18px;
    margin-bottom:24px;
  }

  .media-logos{
    grid-template-columns:1fr;
    gap:22px;
  }

  .media-logo{
    min-height:56px;
  }

  .media-logo img{
    max-width:80%;
    max-height:34px;
  }
}




.happy-customers-section{
  width:100%;
  background:#efefef;
  padding:32px 20px 55px;
  overflow:hidden;
}

.happy-customers-container{
  max-width:1200px;
  margin:0 auto;
  text-align:center;
}

.happy-title{
  font-size:28px;
  font-weight:800;
  color:#000;
  margin:0 0 26px;
}

.happy-slider{
  position:relative;
  max-width:900px;
  margin:0 auto;
}

.happy-slide{
  display:none;
  animation:fadeSlide 0.7s ease;
}

.happy-slide.active{
  display:block;
}

.happy-visual-wrap{
  position:relative;
  width:100%;
  max-width:760px;
  margin:0 auto 24px;
  min-height:220px;
}

.main-customer-circle{
  width:250px;
  height:250px;
  border-radius:50%;
  background:#f2ecec;
  margin:0 auto;
  position:relative;
  display:flex;
  align-items:center;
  justify-content:center;
  animation:floatMain 4s ease-in-out infinite;
}

.main-customer-circle img{
  width:155px;
  height:155px;
  border-radius:50%;
  object-fit:cover;
  display:block;
  box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.floating-avatar{
  position:absolute;
  border-radius:50%;
  overflow:hidden;
  animation:floatAvatar 3.8s ease-in-out infinite;
}

.floating-avatar img{
  width:100%;
  height:100%;
  object-fit:cover;
  display:block;
  border-radius:50%;
}

.avatar-1{
  width:42px;
  height:42px;
  top:8px;
  left:110px;
}

.avatar-2{
  width:62px;
  height:62px;
  top:18px;
  right:120px;
}

.avatar-3{
  width:62px;
  height:62px;
  left:10px;
  bottom:18px;
}

.avatar-4{
  width:46px;
  height:46px;
  right:20px;
  bottom:48px;
}

.confetti{
  position:absolute;
  border-radius:50px;
  opacity:0.9;
  animation:confettiFloat 4s ease-in-out infinite;
}

.confetti-1{
  width:14px;
  height:4px;
  background:#f36a3d;
  top:34px;
  left:38px;
  transform:rotate(80deg);
}

.confetti-2{
  width:18px;
  height:18px;
  border:4px solid #8aa9ea;
  border-left-color:transparent;
  border-top-color:transparent;
  background:transparent;
  top:40px;
  right:8px;
  border-radius:50%;
}

.confetti-3{
  width:16px;
  height:16px;
  border:4px solid #32c267;
  border-right-color:transparent;
  border-bottom-color:transparent;
  background:transparent;
  bottom:48px;
  left:-8px;
  border-radius:50%;
}

.confetti-4{
  width:18px;
  height:18px;
  border:4px solid #f7a545;
  border-left-color:transparent;
  border-top-color:transparent;
  background:transparent;
  bottom:42px;
  right:-10px;
  border-radius:50%;
}

.testimonial-card{
  max-width:560px;
  margin:0 auto;
  background:#fff;
  border-radius:18px;
  padding:26px 30px 22px;
  box-shadow:0 8px 18px rgba(0,0,0,0.10);
}

.testimonial-text{
  font-size:16px;
  line-height:1.6;
  color:#4c4c4c;
  margin:0 0 14px;
}

.customer-name{
  font-size:18px;
  font-weight:800;
  color:#2e2e2e;
  margin:0 0 6px;
}

.customer-location{
  font-size:14px;
  color:#8a8a8a;
  margin:0;
}

.happy-arrow{
  position:absolute;
  top:50%;
  transform:translateY(-50%);
  width:42px;
  height:42px;
  border:none;
  border-radius:50%;
  background:#fff;
  color:#333;
  font-size:20px;
  cursor:pointer;
  box-shadow:0 4px 12px rgba(0,0,0,0.15);
  z-index:5;
}

.happy-arrow.prev{
  left:-10px;
}

.happy-arrow.next{
  right:-10px;
}

.happy-dots{
  display:flex;
  justify-content:center;
  gap:10px;
  margin-top:22px;
}

.happy-dot{
  width:10px;
  height:10px;
  border-radius:50%;
  background:#cfcfcf;
  cursor:pointer;
  transition:0.3s ease;
}

.happy-dot.active{
  background:#f36a3d;
  transform:scale(1.15);
}

@keyframes fadeSlide{
  from{opacity:0; transform:translateY(10px);}
  to{opacity:1; transform:translateY(0);}
}

@keyframes floatMain{
  0%,100%{transform:translateY(0);}
  50%{transform:translateY(-8px);}
}

@keyframes floatAvatar{
  0%,100%{transform:translateY(0) scale(1);}
  50%{transform:translateY(-10px) scale(1.04);}
}

@keyframes confettiFloat{
  0%,100%{transform:translateY(0) rotate(0deg);}
  50%{transform:translateY(-6px) rotate(12deg);}
}

/* tablet */
@media (max-width: 991px){
  .happy-visual-wrap{
    max-width:620px;
    min-height:210px;
  }

  .main-customer-circle{
    width:220px;
    height:220px;
  }

  .main-customer-circle img{
    width:140px;
    height:140px;
  }

  .avatar-1{left:70px;}
  .avatar-2{right:80px;}
}

/* mobile */
@media (max-width: 575px){
  .happy-customers-section{
    padding:26px 14px 40px;
  }

  .happy-title{
    font-size:22px;
    margin-bottom:22px;
  }

  .happy-visual-wrap{
    max-width:100%;
    min-height:190px;
    margin-bottom:18px;
  }

  .main-customer-circle{
    width:180px;
    height:180px;
  }

  .main-customer-circle img{
    width:110px;
    height:110px;
  }

  .avatar-1{
    width:34px;
    height:34px;
    top:8px;
    left:18px;
  }

  .avatar-2{
    width:48px;
    height:48px;
    top:18px;
    right:24px;
  }

  .avatar-3{
    width:48px;
    height:48px;
    left:8px;
    bottom:26px;
  }

  .avatar-4{
    width:38px;
    height:38px;
    right:8px;
    bottom:48px;
  }

  .testimonial-card{
    padding:20px 16px 18px;
    border-radius:16px;
  }

  .testimonial-text{
    font-size:14px;
    line-height:1.7;
  }

  .customer-name{
    font-size:17px;
  }

  .customer-location{
    font-size:13px;
  }

  .happy-arrow{
    width:36px;
    height:36px;
    font-size:18px;
    top:auto;
    bottom:-55px;
    transform:none;
  }

  .happy-arrow.prev{
    left:calc(50% - 50px);
  }

  .happy-arrow.next{
    right:calc(50% - 50px);
  }

  .happy-dots{
    margin-top:65px;
  }
}

.piramal-footer{
  width:100%;
  background:#3f5d7b;
  padding:32px 20px 0;
}

.footer-container{
  max-width:1000px;
  margin:0 auto;
}

.footer-top{
  display:flex;
  align-items:flex-start;
  justify-content:space-between;
  gap:20px;
  padding-bottom:26px;
}

.footer-logo img{
  max-width:160px;
  width:100%;
  height:auto;
  display:block;
}

.credit-report-btn{
  display:inline-flex;
  align-items:center;
  gap:12px;
  text-decoration:none;
  color:#fff;
  font-size:20px;
  font-weight:700;
  margin-top:46px;
}

.free-badge{
  background:#40c463;
  color:#fff;
  font-size:16px;
  font-weight:800;
  padding:8px 14px;
  border-radius:8px;
  line-height:1;
}

.footer-divider{
  width:100%;
  height:1px;
  background:rgba(255,255,255,0.18);
  margin-bottom:36px;
}

.footer-links-grid{
  display:grid;
  grid-template-columns:repeat(4, 1fr);
  gap:40px;
  padding-bottom:0;
}

.footer-column h3{
  font-size:20px;
  font-weight:800;
  color:#fff;
  margin:0 0 20px;
}

.footer-column ul{
  list-style:none;
  margin:0;
  padding:0;
}

.footer-column ul li{
  margin-bottom:18px;
}

.footer-column ul li a{
  color:#fff;
  text-decoration:none;
  font-size:18px;
  line-height:1.5;
  font-weight:400;
  transition:0.3s ease;
}

.footer-column ul li a:hover{
  opacity:0.85;
}

/* Tablet */
@media (max-width: 1199px){
  .footer-links-grid{
    grid-template-columns:repeat(2, 1fr);
    gap:34px 28px;
  }

  .footer-column h3{
    font-size:24px;
  }

  .footer-column ul li a{
    font-size:20px;
  }

  .credit-report-btn{
    font-size:18px;
  }
}

/* Mobile */
@media (max-width: 767px){
  .piramal-footer{
    padding:24px 15px 10px;
  }

  .footer-top{
    flex-direction:column;
    align-items:flex-start;
    gap:16px;
    padding-bottom:20px;
  }

  .footer-logo img{
    max-width:180px;
  }

  .credit-report-btn{
    margin-top:0;
    font-size:18px;
    gap:10px;
  }

  .free-badge{
    font-size:14px;
    padding:7px 12px;
  }

  .footer-divider{
    margin-bottom:24px;
  }

  .footer-links-grid{
    grid-template-columns:1fr;
    gap:26px;
  }

  .footer-column h3{
    font-size:22px;
    margin-bottom:14px;
  }

  .footer-column ul li{
    margin-bottom:12px;
  }

  .footer-column ul li a{
    font-size:18px;
    line-height:1.45;
  }
}

/*impact section*/
.impact-section{
width:100%;
background:#f3f3f3;
padding:70px 20px;
}

.impact-container{
max-width:1200px;
margin:auto;
text-align:center;
}

.impact-title{
font-size:34px;
color:#1d2433;
margin-bottom:15px;
}

.impact-line{
width:120px;
height:5px;
background:#ff4d15;
margin:20px auto 60px;
}

.impact-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:40px;
}

.impact-card h3{
font-size:55px;
color:#ff4d15;
font-weight:700;
margin-bottom:25px;
}

.impact-card p{
font-size:22px;
color:#253b5b;
}

/* Tablet */
@media(max-width:991px){

.impact-grid{
grid-template-columns:repeat(2,1fr);
}

}

/* Mobile */
@media(max-width:600px){

.impact-title{
font-size:22px;
}

.impact-grid{
grid-template-columns:1fr;
gap:35px;
}

.impact-card h3{
font-size:60px;
}

.impact-card p{
font-size:18px;
}

}



 *{
      margin:0;
      padding:0;
      box-sizing:border-box;
    }

    body{
      font-family:'Poppins',sans-serif;
      background:#f1f1f1;
      color:#223547;
    }

    .values-section{
      width:100%;
      padding:60px 20px 70px;
      background:#efefef;
    }

    .container{
      width:100%;
      max-width:1280px;
      margin:0 auto;
    }

    .section-title{
      text-align:center;
      font-size:clamp(28px, 3vw, 52px);
      font-weight:500;
      line-height:1.25;
      color:#17253a;
      margin-bottom:14px;
    }

    .title-line{
      width:100px;
      height:5px;
      background:#ff4b12;
      margin:0 auto 46px;
      border-radius:50px;
    }

    .tab-switch{
      display:flex;
      justify-content:center;
      margin-bottom:40px;
    }

    .tab-buttons{
      display:inline-flex;
      align-items:center;
      background:#d9d9d9;
      border-radius:999px;
      padding:4px;
      gap:4px;
      flex-wrap:wrap;
    }

    .tab-btn{
      border:none;
      outline:none;
      background:transparent;
      color:#30485d;
      padding:14px 24px;
      font-size:16px;
      font-weight:500;
      border-radius:999px;
      cursor:pointer;
      transition:all 0.3s ease;
      font-family:'Poppins',sans-serif;
      white-space:nowrap;
    }

    .tab-btn.active{
      background:#ff4b12;
      color:#fff;
      box-shadow:0 4px 12px rgba(255,75,18,0.25);
    }

    .tab-panel{
      display:none;
      animation:fadeIn 0.35s ease;
    }

    .tab-panel.active{
      display:block;
    }

    @keyframes fadeIn{
      from{
        opacity:0;
        transform:translateY(10px);
      }
      to{
        opacity:1;
        transform:translateY(0);
      }
    }

    /* GYAN MUDRA TAB */
    .gyan-layout{
      display:grid;
      grid-template-columns:1.1fr 0.9fr;
      align-items:center;
      gap:40px;
      min-height:420px;
    }

    .gyan-content h3{
      font-size:22px;
      font-weight:700;
      margin-bottom:28px;
      color:#2a3e51;
    }

    .gyan-content p{
      font-size:17px;
      line-height:2;
      color:#3b4e60;
      margin-bottom:28px;
    }

    .gyan-content strong{
      font-weight:700;
      color:#2d3e4f;
    }

    .gyan-image{
      display:flex;
      justify-content:center;
      align-items:center;
      min-height:400px;
    }

    .gyan-image svg{
      width:100%;
      max-width:420px;
      height:auto;
      display:block;
    }

    /* CORE VALUES TAB */
    .cards-grid{
      display:grid;
      grid-template-columns:repeat(4, 1fr);
      gap:28px;
      margin-top:8px;
    }

    .value-card{
      background:#24394a;
      color:#fff;
      border-radius:20px;
      padding:30px 28px 34px;
      min-height:360px;
      box-shadow:0 10px 24px rgba(0,0,0,0.08);
      transition:transform 0.3s ease;
    }

    .value-card:hover{
      transform:translateY(-5px);
    }

    .icon-wrap{
      width:82px;
      height:82px;
      border-radius:50%;
      background:rgba(255,255,255,0.08);
      display:flex;
      align-items:center;
      justify-content:center;
      margin-bottom:24px;
    }

    .icon-wrap svg{
      width:42px;
      height:42px;
      stroke:#ffffff;
    }

    .value-card h4{
      font-size:22px;
      font-weight:700;
      margin-bottom:14px;
    }

    .value-card p{
      font-size:16px;
      line-height:1.8;
      color:rgba(255,255,255,0.95);
    }

    .value-card p strong{
      color:#fff;
      font-weight:700;
    }

    /* Tablet */
    @media (max-width: 1100px){
      .cards-grid{
        grid-template-columns:repeat(2, 1fr);
      }

      .gyan-layout{
        grid-template-columns:1fr;
        text-align:left;
      }

      .gyan-image{
        order:2;
        min-height:auto;
      }

      .gyan-content{
        order:1;
      }
    }

    /* Mobile */
    @media (max-width: 767px){
      .values-section{
        padding:40px 16px 50px;
      }

      .section-title{
        font-size:24px;
        line-height:1.4;
      }

      .title-line{
        width:80px;
        height:4px;
        margin-bottom:30px;
      }

      .tab-switch{
        margin-bottom:28px;
      }

      .tab-buttons{
        width:100%;
        justify-content:center;
        padding:6px;
      }

      .tab-btn{
        flex:1 1 calc(50% - 4px);
        text-align:center;
        font-size:14px;
        padding:12px 14px;
      }

      .gyan-layout{
        gap:24px;
      }

      .gyan-content h3{
        font-size:20px;
        margin-bottom:18px;
      }

      .gyan-content p{
        font-size:15px;
        line-height:1.9;
        margin-bottom:18px;
      }

      .gyan-image svg{
        max-width:200px;
      }

      .cards-grid{
        grid-template-columns:1fr;
        gap:18px;
      }

      .value-card{
        min-height:auto;
        padding:24px 22px 28px;
      }

      .icon-wrap{
        width:72px;
        height:72px;
        margin-bottom:18px;
      }

      .value-card h4{
        font-size:20px;
      }

      .value-card p{
        font-size:15px;
        line-height:1.75;
      }
    }
 
    *{
margin:0;
padding:0;
box-sizing:border-box;
font-family: Arial, Helvetica, sans-serif;
}

.about-section{
padding:80px 20px;
background:#f7f9fc;
}

.about-container{
max-width:1200px;
margin:auto;
display:flex;
align-items:center;
justify-content:space-between;
gap:40px;
flex-wrap:wrap;
margin-left:15px;
}

.about-text{
flex:1;
min-width:320px;
}

.about-text h2{
font-size:35px;
color:#0b2b4c;
margin-bottom:20px;
}

.about-text p{
font-size:16px;
line-height:1.8;
color:#555;
margin-bottom:18px;
}

.about-text strong{
color:#0b2b4c;
}

.about-image{
flex:1;
text-align:center;
min-width:300px;
}

.about-image img{
width:100%;
max-width:530px;
height:340px;
border-radius:10px;
}

@media (max-width:768px){

.about-container{
flex-direction:column;
text-align:left;
}

.about-text h2{
font-size:32px;
}

.about-image img{
max-width:320px;
height:220px;
}

}


*{
    box-sizing:border-box;
  }

  .mission-vision-section{
    width:100%;
    padding:70px 20px;
    background:#f7f9fc;
  }

  .mv-container{
    max-width:1200px;
    margin:0 auto;
  }

  .mv-heading{
    text-align:center;
    max-width:760px;
    margin:0 auto 45px;
  }

  .mv-heading h2{
    font-size:38px;
    color:#0b2b4c;
    margin-bottom:12px;
    font-weight:700;
  }

  .mv-heading p{
    font-size:17px;
    color:#5b6470;
    line-height:1.7;
  }

  .mv-grid{
    display:grid;
    grid-template-columns:repeat(2, 1fr);
    gap:30px;
  }

  .mv-card{
    background:#ffffff;
    border-radius:18px;
    padding:35px 30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:all 0.3s ease;
    height:100%;
  }

  .mv-card:hover{
    transform:translateY(-5px);
  }

  .mv-icon{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#0b2b4c;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    margin-bottom:20px;
  }

  .mv-card h3{
    font-size:26px;
    color:#000;
    margin-bottom:15px;
    font-weight:700;
  }

  .mv-card p{
    font-size:16px;
    color:#555;
    line-height:1.9;
    margin:0;
  }

  @media (max-width:991px){
    .mv-heading h2{
      font-size:32px;
    }

    .mv-grid{
      gap:22px;
    }

    .mv-card{
      padding:28px 24px;
    }
  }

  @media (max-width:768px){
    .mission-vision-section{
      padding:50px 15px;
    }

    .mv-heading{
      margin-bottom:30px;
    }

    .mv-heading h2{
      font-size:28px;
    }

    .mv-heading p{
      font-size:15px;
    }

    .mv-grid{
      grid-template-columns:1fr;
    }

    .mv-card{
      padding:24px 20px;
      border-radius:14px;
    }

    .mv-icon{
      width:60px;
      height:60px;
      font-size:26px;
      margin-bottom:16px;
    }

    .mv-card h3{
      font-size:22px;
      margin-bottom:12px;
    }

    .mv-card p{
      font-size:15px;
      line-height:1.8;
    }
  }
    .nav__inner{
  max-width:var(--max);
  margin:0 auto;
  display:flex;
  align-items:center;
  gap:18px;
  padding:10px 16px;   /* 🔥 Reduced header height */
}

.brand img{
  height:62px;   /* 🔥 Perfect clean logo size */
  width:150px;
  display:block;
}

.footer-logo img{
  height:68px;
  width:180px;
  display:block;
  margin-top:40px;
}




  </style>
</head>

<body>

<?php if ($success === '1'): ?>
  <div class="alert alert-success">Loan Application Submitted Successfully!</div>
<?php endif; ?>

<?php if ($error !== ''): ?>
  <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<header class="nav">
  <div class="nav__inner">
    <a class="brand" href="#">
  <img src="img/gv_logo.png" alt="GV Finance">
</a>

    <button class="burger" id="burger" aria-label="Open Menu">
      <span></span><span></span><span></span>
    </button>

    

    <nav class="menu" id="menu">
      <ul class="menu__list">
        <li class="menu__item">
          <a class="menu__link" href="index.php">Home</a>
        </li>

        <li class="menu__item">
          <a class="menu__link" href="about.php">About Us</a>
          
        </li>

        <li class="menu__item">
          <a class="menu__link" href="services.php">Services</a>
        </li>

        

        <li class="menu__item">
          <a class="menu__link" href="contact.php">Contact Us</a>
        </li>
      </ul>
    </nav>

</div>
</header>




<!--about section-->
<section class="about-section">

<div class="about-container">

<div class="about-text">

<h2>About Us</h2>

<p>
We are a trusted financial service platform dedicated to helping individuals and businesses access the right loan solutions quickly and easily. Our goal is to simplify the borrowing process by providing transparent, reliable, and customer-focused financial services.
</p>

<p>
With a strong network of banks and financial institutions, we help customers compare and apply for a wide range of loans, including <strong>Personal Loans, Home Loans, Business Loans, Car Loans, and Loan Against Property.</strong> Our platform is designed to make the entire process fast, secure, and hassle-free.
</p>

<p>
At our company, we believe that financial support should be accessible to everyone. Our experienced team works closely with customers to understand their needs and guide them toward the best loan options with competitive interest rates and flexible repayment plans.
</p>

<p>
We focus on providing quick approvals, minimal documentation, and professional support, ensuring that every customer receives a smooth and reliable loan experience.
</p>


</div>


<div class="about-image">

<img src="img/business_loan.jpg" alt="Loan Services">

</div>

</div>

</section>





<!--mission & vision-->
<section class="mission-vision-section">
  <div class="mv-container">
    
    <div class="mv-heading">
      <h2>Mission & Vision</h2>
      <p>
        We are committed to making loan services simple, transparent, and accessible for every customer.
      </p>
    </div>

    <div class="mv-grid">
      
      <div class="mv-card">
        <div class="mv-icon">🎯</div>
        <h3>Our Mission</h3>
        <p>
          Our mission is to provide reliable and customer-friendly financial solutions that help individuals
          and businesses access the right loan options with ease. We aim to simplify the loan process through
          fast approvals, minimal documentation, transparent guidance, and trusted financial support.
        </p>
      </div>

      <div class="mv-card">
        <div class="mv-icon">🚀</div>
        <h3>Our Vision</h3>
        <p>
          Our vision is to become a trusted and leading loan service platform known for transparency,
          convenience, and excellence. We strive to empower customers with financial confidence by
          connecting them to the best loan opportunities for their personal and business goals.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="piramal-footer" id="contact">
  <div class="footer-container">
    <div class="footer-top">
      <div class="footer-logo">
  <img src="img/gv_logo.png" alt="GV Finance">
 </div>

      
    </div>

    <div class="footer-divider"></div>

    <div class="footer-links-grid">
      <div class="footer-column">
        <h3>Housing Finance</h3>
        <ul>
          <li><a href="#">Home Loan</a></li>
          <li><a href="#">Construction Loan</a></li>
          <li><a href="#">Loan Balance Transfer</a></li>
          <li><a href="#">Documents Required for Home Loan</a></li>
          <li><a href="#">Home Loan Interest Rate</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Business Finance</h3>
        <ul>
          <li><a href="#">Business Loans</a></li>
          <li><a href="#">Loan Against Property</a></li>
          <li><a href="#">Loan Against Mutual Fund</a></li>
          <li><a href="#">Secured Business Loan</a></li>
          <li><a href="#">Working Capital Loan</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Personal Finance</h3>
        <ul>
          <li><a href="#">Personal Loan</a></li>
          <li><a href="#">Travel Loan</a></li>
          <li><a href="#">Emergency Loan</a></li>
          <li><a href="#">Marriage Loan</a></li>
          <li><a href="#">Gold Loan</a></li>
          <li><a href="#">Education Loan</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Other Loans</h3>
        <ul>
          <li><a href="#">Used Car Loan</a></li>
          <li><a href="#">Group Loan</a></li>
          <li><a href="#">Insta Loan</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>



<script>

const counters = document.querySelectorAll(".counter");

const runCounter = () => {

counters.forEach(counter => {

const target = +counter.getAttribute("data-target");
const suffix = counter.getAttribute("data-suffix") || "+";

let count = 0;

const speed = target / 80;

const update = () => {

count += speed;

if(count < target){

counter.innerText = Math.floor(count) + suffix;

requestAnimationFrame(update);

}
else{

counter.innerText = target + suffix;

}

};

update();

});

};

let started = false;

window.addEventListener("scroll", function(){

const section = document.querySelector(".impact-section");

const position = section.getBoundingClientRect().top;

if(position < window.innerHeight - 100 && !started){

runCounter();

started = true;

}

});

</script>

<script>
  /* ================= MOBILE MENU ================= */
  const burger = document.getElementById("burger");
  const menu = document.getElementById("menu");

  if (burger && menu) {
    burger.addEventListener("click", function () {
      menu.classList.toggle("is-open");
    });
  }

</script>
</body>
</html>