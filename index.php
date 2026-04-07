<?php
$success = isset($_GET['success']) ? $_GET['success'] : '';
$error   = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Piramal Finance</title>

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

    *{
      box-sizing:border-box;
      margin:0;
      padding:0;
    }

    body{
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
    }

    .menu__item{position:relative;}

    .menu__link{
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

    .badge{
      font-size:11px;
      font-weight:800;
      padding:2px 7px;
      border-radius:999px;
      background:#22c55e;
      color:#fff;
      margin-left:4px;
    }

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
      min-height:520px;
      border-bottom:1px solid rgba(0,0,0,.06);
      background:#e8f2ed;
    }

    .slide{
      position:absolute;
      inset:0;
      opacity:0;
      visibility:hidden;
      transition:opacity .8s ease, visibility .8s ease;
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
      min-height:520px;
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
      font-size:.9em;
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
      transition:.3s ease;
      font-size:15px;
    }

    .hero__btn:hover{ background:#e85a2f; }

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
      background:rgba(255,255,255,.7);
      cursor:pointer;
      transition:.3s ease;
      padding:0;
    }

    .dot.active{
      background:#ff6a3d;
      transform:scale(1.15);
    }

    /* ================= LOAN PRODUCTS ================= */
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
      color:#0b2b4c;
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
      transition:all .25s ease;
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
      background:#f3f7fb;
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

    /* ================= APPLY LOAN MODAL ================= */
    .loan-modal,
    .emi-modal,
    .sip-modal{
      position:fixed;
      inset:0;
      display:none;
      align-items:center;
      justify-content:center;
      padding:20px;
      z-index:3000;
    }

    .loan-modal{
      background:rgba(11, 34, 57, 0.76);
    }

    .emi-modal,
    .sip-modal{
      background:rgba(0,0,0,0.45);
    }

    .loan-modal.show,
    .emi-modal.show,
    .sip-modal.show{
      display:flex;
    }

    .loan-popup,
    .emi-modal-box,
    .sip-modal-box{
      width:100%;
      position:relative;
      box-shadow:0 20px 50px rgba(0,0,0,.18);
    }

    .loan-popup{
      max-width:600px;
      max-height:90vh;
      overflow-y:auto;
      background:#f5efe8;
      border-radius:16px;
      padding:28px 34px 32px;
    }

    .emi-modal-box,
    .sip-modal-box{
      max-width:1180px;
      max-height:95vh;
      overflow-y:auto;
      background:#fff;
      border-radius:14px;
      padding:22px;
    }

    .close-btn,
    .emi-close-btn,
    .sip-close-btn{
      position:absolute;
      top:14px;
      right:18px;
      width:42px;
      height:42px;
      border:none;
      border-radius:50%;
      background:#f1f1f1;
      font-size:28px;
      line-height:1;
      cursor:pointer;
      color:#333;
      z-index:2;
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
      margin-top:20px;
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

    .zip-status{
      display:block;
      margin-top:8px;
      font-size:13px;
      color:#6b7280;
    }

    /* ================= CALCULATORS ================= */
    .calculator-section{
      width:100%;
      padding:40px 20px 50px;
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
      color:#0b2b4c;
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
      transition:.3s ease;
    }

    .try-btn:hover{
      background:#ea5f34;
    }

    .emi-card{
      background-image:url("img/cal-1.png");
    }

    .sip-card{
      background-image:url("img/cal-2.png");
    }

    /* ================= EMI / SIP MODALS ================= */
    .emi-calculator-box,
    .sip-calculator-box{
      background:#fff;
      border:1px solid #e7e7e7;
      border-radius:12px;
      padding:35px;
      display:grid;
      grid-template-columns:1.25fr 0.9fr;
      gap:40px;
    }

    .emi-title,
    .sip-title{
      font-size:32px;
      font-weight:700;
      color:#1f2d4d;
      margin-bottom:8px;
    }

    .emi-subtitle,
    .sip-subtitle{
      font-size:15px;
      color:#6b7280;
      margin-bottom:30px;
    }

    .emi-field,
    .sip-field{
      margin-bottom:34px;
    }

    .emi-field-top,
    .sip-field-top{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:16px;
      margin-bottom:14px;
    }

    .emi-field-top label,
    .sip-field-top label{
      font-size:18px;
      color:#22335b;
      font-weight:500;
    }

    .emi-value-box,
    .sip-value-box{
      min-width:145px;
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

    .emi-value-box input,
    .sip-value-box input{
      width:100%;
      border:none;
      outline:none;
      background:transparent;
      text-align:right;
      color:#0fb784;
      font-size:18px;
      font-weight:600;
    }

    .emi-value-box input::-webkit-outer-spin-button,
    .emi-value-box input::-webkit-inner-spin-button,
    .sip-value-box input::-webkit-outer-spin-button,
    .sip-value-box input::-webkit-inner-spin-button{
      -webkit-appearance:none;
      margin:0;
    }

    .emi-value-box input[type=number],
    .sip-value-box input[type=number]{
      appearance:textfield;
      -moz-appearance:textfield;
    }

    .emi-field input[type="range"],
    .sip-field input[type="range"]{
      width:100%;
      height:4px;
      border-radius:10px;
      appearance:none;
      -webkit-appearance:none;
      background:linear-gradient(to right, #11b886 0%, #11b886 30%, #e6e6ea 30%, #e6e6ea 100%);
      outline:none;
    }

    .emi-field input[type="range"]::-webkit-slider-thumb,
    .sip-field input[type="range"]::-webkit-slider-thumb{
      appearance:none;
      -webkit-appearance:none;
      width:28px;
      height:28px;
      border-radius:50%;
      background:#efefef;
      box-shadow:0 1px 6px rgba(0,0,0,0.18);
      cursor:pointer;
    }

    .emi-field input[type="range"]::-moz-range-thumb,
    .sip-field input[type="range"]::-moz-range-thumb{
      width:28px;
      height:28px;
      border:none;
      border-radius:50%;
      background:#efefef;
      box-shadow:0 1px 6px rgba(0,0,0,0.18);
      cursor:pointer;
    }

    .emi-results,
    .sip-results{
      margin-top:18px;
      max-width:520px;
    }

    .emi-result-row,
    .sip-result-row{
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:18px;
      padding:10px 0;
      font-size:18px;
      color:#6b7280;
    }

    .emi-result-row strong,
    .sip-result-row strong{
      color:#1e2a4a;
      font-size:18px;
      font-weight:700;
    }

    .emi-right,
    .sip-right{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:flex-start;
      padding-top:35px;
    }

    .emi-legend,
    .sip-legend{
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

    .principal-color{ background:#dfe2f0; }
    .interest-color{ background:#5568ef; }
    .sip-invested-color{ background:#dfe2f0; }
    .sip-return-color{ background:#5568ef; }

    .emi-chart-wrap,
    .sip-chart-wrap{
      display:flex;
      justify-content:center;
      align-items:center;
      margin:8px 0 35px;
    }

    .emi-chart,
    .sip-chart{
      width:250px;
      height:250px;
      border-radius:50%;
      position:relative;
      transition:.3s ease;
    }

    .emi-chart{
      background:conic-gradient(#5568ef 0deg 35deg, #dfe2f0 35deg 360deg);
    }

    .sip-chart{
      background:conic-gradient(#5568ef 0deg 60deg, #dfe2f0 60deg 360deg);
    }

    .emi-chart-inner,
    .sip-chart-inner{
      width:156px;
      height:156px;
      background:#fff;
      border-radius:50%;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%, -50%);
    }

    .sip-tabs{
      display:flex;
      gap:15px;
      margin-bottom:30px;
    }

    .sip-tab-btn{
      border:none;
      background:transparent;
      padding:12px 22px;
      border-radius:999px;
      font-size:18px;
      font-weight:600;
      cursor:pointer;
      color:#7d8497;
      transition:0.3s;
    }

    .sip-tab-btn.active{
      background:#dff3ec;
      color:#10b981;
    }

    .sip-action{
      margin-top:18px;
    }

    .sip-invest-btn{
      background:#10b981;
      color:#fff;
      border:none;
      padding:14px 26px;
      border-radius:10px;
      font-weight:700;
      font-size:16px;
      cursor:pointer;
      transition:.3s ease;
    }

    .sip-invest-btn:hover{
      background:#0ea371;
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
      color:#0b2b4c;
      line-height:1.2;
      margin-bottom:18px;
    }

    .section-subtitle{
      font-size:28px;
      color:#333;
      margin-bottom:20px;
      font-weight:400;
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
      background:#fff;
      box-shadow:0 6px 18px rgba(0,0,0,0.06);
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
      transition:.3s ease;
      margin-bottom:40px;
    }

    .cta-btn:hover{
      background:#db5b2e;
    }

    /* ================= HAPPY CUSTOMERS ================= */
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
      font-size:35px;
      font-weight:700;
      color:#0b2b4c;
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

    .avatar-1{ width:42px; height:42px; top:8px; left:110px; }
    .avatar-2{ width:62px; height:62px; top:18px; right:120px; }
    .avatar-3{ width:62px; height:62px; left:10px; bottom:18px; }
    .avatar-4{ width:46px; height:46px; right:20px; bottom:48px; }

    .confetti{
      position:absolute;
      border-radius:50px;
      opacity:0.9;
      animation:confettiFloat 4s ease-in-out infinite;
    }

    .confetti-1{
      width:14px; height:4px; background:#f36a3d; top:34px; left:38px; transform:rotate(80deg);
    }
    .confetti-2{
      width:18px; height:18px; border:4px solid #8aa9ea; border-left-color:transparent; border-top-color:transparent; background:transparent; top:40px; right:8px; border-radius:50%;
    }
    .confetti-3{
      width:16px; height:16px; border:4px solid #32c267; border-right-color:transparent; border-bottom-color:transparent; background:transparent; bottom:48px; left:-8px; border-radius:50%;
    }
    .confetti-4{
      width:18px; height:18px; border:4px solid #f7a545; border-left-color:transparent; border-top-color:transparent; background:transparent; bottom:42px; right:-10px; border-radius:50%;
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
      transition:.3s ease;
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

    /* ================= ABOUT ================= */
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
      height:360px;
      border-radius:10px;
      object-fit:cover;
    }

    /* ================= MISSION & VISION ================= */
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
      font-size:35px;
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
      transition:all .3s ease;
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

    /* ================= FOOTER ================= */
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
      max-width:180px;
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
      padding-bottom:25px;
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
      transition:.3s ease;
    }

    .footer-column ul li a:hover{
      opacity:.85;
    }

    /*why choose us section*/
    .why-choose-section{
      width:100%;
      background:#efefef;
      padding:40px 20px 50px;
    }

    .why-choose-container{
      max-width:1100px;
      margin:0 auto;
    }

    .why-title{
      font-size:32px;
      font-weight:700;
      color:#000;
      margin:0 0 12px;
      line-height:1.2;
    }

    .why-text{
      font-size:18px;
      line-height:1.55;
      color:#556274;
      margin:0 0 10px;
      max-width:1200px;
    }

    .why-highlight{
      margin-bottom:34px;
    }

    .why-highlight span{
      color:#f36a3d;
    }

    .why-grid{
      display:grid;
      grid-template-columns:repeat(4, 1fr);
      gap:46px 34px;
    }

    .why-card{
      text-align:left;
    }

    .why-icon-circle{
      width:72px;
      height:72px;
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      margin-bottom:20px;
    }

    .why-icon-circle img{
      width:84px;
      height:84px;
      object-fit:contain;
      display:block;
    }

    .why-card h3{
      font-size:17px;
      line-height:1.4;
      color:#1f2a3a;
      font-weight:700;
      margin:0;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width:1000px){
      .loan-grid{ grid-template-columns:repeat(2, 1fr); }
    }

    @media (max-width:991px){
      .stats-grid{
        grid-template-columns:repeat(2, 1fr);
        gap:40px 20px;
        margin-bottom:55px;
      }

      .stat-label{ font-size:24px; }
      .stat-value{ font-size:28px; }

      .emi-calculator-box,
      .sip-calculator-box{
        grid-template-columns:1fr;
        gap:30px;
      }

      .emi-right,
      .sip-right{ padding-top:0; }
      .emi-legend,
      .sip-legend{ justify-content:center; }

      .mv-grid{ grid-template-columns:1fr; }

      .footer-links-grid{
        grid-template-columns:repeat(2, 1fr);
        gap:34px 28px;
      }

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

    @media (max-width:900px){
      .burger{display:flex;}

      .menu{
        position:fixed;
        top:70px;
        left:0;
        right:0;
        background:var(--nav-bg);
        display:none;
        padding:14px 16px 18px;
      }

      .menu.is-open{display:block;}

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

      .menu__link{
        width:100%;
        justify-content:space-between;
        padding:12px 14px;
      }

      .hero-slider{ min-height:580px; }

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

      .hero__art{ justify-content:center; }
      .hero__kicker{ font-size:34px; }

      .hero__btn{
        margin-left:auto;
        margin-right:auto;
      }

      .hero__art img{ max-height:280px; }
    }

    @media (max-width:768px){
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

      .calculator-grid{ grid-template-columns:1fr; }

      .about-container{
        flex-direction:column;
        text-align:left;
      }

      .about-text h2{ font-size:32px; }

      .about-image img{
        max-width:320px;
        height:auto;
      }

      .mv-heading h2{ font-size:28px; }
      .mv-heading p{ font-size:15px; }

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

      .emi-modal-box,
      .sip-modal-box{ padding:14px; }

      .emi-calculator-box,
      .sip-calculator-box{
        padding:18px 14px;
        gap:24px;
      }

      .emi-title,
      .sip-title{ font-size:26px; }

      .emi-subtitle,
      .sip-subtitle{
        font-size:14px;
        margin-bottom:22px;
      }

      .emi-field,
      .sip-field{ margin-bottom:26px; }

      .emi-field-top,
      .sip-field-top{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
      }

      .emi-field-top label,
      .sip-field-top label{ font-size:16px; }

      .emi-value-box,
      .sip-value-box{
        width:100%;
        min-width:100%;
        font-size:16px;
      }

      .emi-value-box input,
      .sip-value-box input{ font-size:16px; }

      .emi-result-row,
      .sip-result-row{ font-size:15px; }

      .emi-result-row strong,
      .sip-result-row strong{ font-size:15px; }

      .emi-chart,
      .sip-chart{
        width:210px;
        height:210px;
      }

      .emi-chart-inner,
      .sip-chart-inner{
        width:126px;
        height:126px;
      }

      .loan-popup{
        padding:22px 18px 24px;
      }

      .form-header h2{
        font-size:21px;
      }

      .footer-top{
        flex-direction:column;
        align-items:flex-start;
        gap:16px;
        padding-bottom:20px;
      }

      .credit-report-btn{
        margin-top:0;
        font-size:18px;
      }

      .footer-links-grid{ grid-template-columns:1fr; }
    }

    @media (max-width:600px){
      .hero-slider{ min-height:520px; }

      .slide__wrap{
        min-height:520px;
        padding:28px 14px 58px;
        gap:18px;
      }

      .hero__kicker{
        font-size:28px;
        line-height:1.2;
      }

      .hero__kicker span{ font-size:.88em; }
      .hero__btn{ padding:11px 18px; font-size:14px; }
      .hero__art img{ max-height:220px; }

      .loan-grid{ grid-template-columns:1fr; }
      .loan-title{ font-size:28px; }
      .loan-text{ font-size:16px; }
    }

    @media (max-width:575px){
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

      .stat-value{ font-size:24px; }

      .cta-btn{
        width:80%;
        max-width:300px;
        padding:18px 20px;
        font-size:18px;
        border-radius:12px;
      }

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

      .customer-name{ font-size:17px; }
      .customer-location{ font-size:13px; }

      .happy-dots{ margin-top:40px; }

      .why-choose-section{
        padding:30px 15px 36px;
      }

      .why-title{
        font-size:24px;
        margin-bottom:10px;
      }

      .why-text{
        font-size:15px;
        line-height:1.7;
        margin-bottom:12px;
      }

      .why-highlight{
        margin-bottom:24px;
      }

      .why-grid{
        grid-template-columns:1fr;
        gap:24px;
      }

      .why-card{
        text-align:center;
      }

      .why-icon-circle{
        margin:0 auto 16px;
        width:66px;
        height:66px;
      }

      .why-icon-circle img{
        width:84px;
        height:84px;
      }

      .why-card h3{
        font-size:18px;
        line-height:1.45;
      }

      .sip-tabs{
        flex-wrap:wrap;
      }

      .sip-tab-btn{
        width:100%;
        text-align:center;
      }

      .sip-invest-btn{
        width:100%;
      }
    }

    @media (max-width:420px){
      .nav__inner{ padding:12px; }
      .brand img{ height:30px; }
      .hero-slider{ min-height:500px; }
      .slide__wrap{ min-height:500px; }
      .hero__kicker{ font-size:24px; }
      .hero__art img{ max-height:190px; }

      .hero__btn{
        width:100%;
        max-width:220px;
      }

      .loan-popup{
        padding:20px 14px 20px;
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
        <li class="menu__item"><a class="menu__link" href="index.php">Home</a></li>
        <li class="menu__item"><a class="menu__link" href="about.php">About Us</a></li>
        <li class="menu__item"><a class="menu__link" href="services.php">Services</a></li>
        <li class="menu__item"><a class="menu__link" href="contact.php">Contact Us</a></li>
      </ul>
    </nav>

    
</header>

<!-- HERO SLIDER -->
<section class="hero-slider" id="heroSlider">
  <div class="slide active" style="background-image:url('img/slider-bg-1.jpg');">
    <div class="slide__wrap">
      <div class="hero__left">
        <h1 class="hero__kicker">
          Fast & Easy Loan Solutions
          <span>Apply for Home, Personal & Business Loans with Confidence</span>
        </h1>
        <button type="button" class="hero__btn open-loan-modal" data-loan="Buy New Home">Apply Loan Now</button>
      </div>
      <div class="hero__art">
        <img src="img/Home.png" alt="Loan Services">
      </div>
    </div>
  </div>

  <div class="slide" style="background-image:url('img/slider-bg-2.jpg');">
    <div class="slide__wrap">
      <div class="hero__left">
        <h2 class="hero__kicker">
          Compare Best Loan Offers
          <span>Transparent process, fast approvals and trusted support</span>
        </h2>
        <button type="button" class="hero__btn open-loan-modal" data-loan="Home Construction">Apply Loan Now</button>
      </div>
      <div class="hero__art">
        <img src="img/Car-loan-2.png" alt="Best Loan Offers">
      </div>
    </div>
  </div>

  <div class="slide" style="background-image:url('img/slider-bg-3.jpg');">
    <div class="slide__wrap">
      <div class="hero__left">
        <h2 class="hero__kicker">
          Financial Support for Every Need
          <span>From dream homes to business growth, we help you move forward</span>
        </h2>
        <button type="button" class="hero__btn open-loan-modal" data-loan="Personal Loan">Apply Loan Now</button>
      </div>
      <div class="hero__art">
        <img src="img/Finance.png" alt="Financial Support">
      </div>
    </div>
  </div>

  <div class="slider-dots" id="sliderDots">
    <button class="dot active" data-slide="0"></button>
    <button class="dot" data-slide="1"></button>
    <button class="dot" data-slide="2"></button>
  </div>
</section>

<!-- LOAN PRODUCTS -->
<section class="loan-section" id="loan-products">
  <div class="loan-container">
    <h2 class="loan-title">Loan Products</h2>

    <div class="loan-grid">
      <div class="loan-card open-loan-modal" data-loan="Buy New Home">
        <div class="loan-icon-wrap">
          <img src="img/credit1.png" alt="Buy New Home" class="loan-icon">
        </div>
        <div class="loan-text">Buy New Home</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Home Construction">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco2.png" alt="Home Construction" class="loan-icon">
        </div>
        <div class="loan-text">Home Construction</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Business Loan">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco3.png" alt="Business Loan" class="loan-icon">
        </div>
        <div class="loan-text">Business Loan</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Personal Loan">
        <div class="loan-icon-wrap">
          <img src="img/credit_sc4.png" alt="Personal Loan" class="loan-icon">
        </div>
        <div class="loan-text">Personal Loan</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Loan Against Property">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco5.png" alt="Loan Against Property" class="loan-icon">
        </div>
        <div class="loan-text">Loan Against Property</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Secured Business Loan">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco6.png" alt="Secured Business Loan" class="loan-icon">
        </div>
        <div class="loan-text">Secured Business Loan</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Used Car Loan">
        <div class="loan-icon-wrap">
          <img src="img/credit_sc7.png" alt="Used Car Loan" class="loan-icon">
        </div>
        <div class="loan-text">Used Car Loan</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Loan Against Securities">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco8.png" alt="Loan Against Securities" class="loan-icon">
        </div>
        <div class="loan-text">Loan Against Securities</div>
      </div>

      <div class="loan-card open-loan-modal" data-loan="Insurance Services">
        <div class="loan-icon-wrap">
          <img src="img/credit_sco9.png" alt="Insurance Services" class="loan-icon">
        </div>
        <div class="loan-text">Insurance Services</div>
      </div>
    </div>
  </div>
</section>

<!-- APPLY LOAN FORM MODAL -->
<div class="loan-modal" id="loanModal">
  <div class="loan-popup">
    <button class="close-btn" id="closeLoanModal" type="button">&times;</button>

    <div class="form-header">
      <div class="icon-box">₹</div>
      <h2>In A Minute</h2>
    </div>

    <form action="Admin/submit_contact.php" method="POST">
      <div class="form-grid">
        <div class="form-group">
          <label>I am looking for? <span class="required">*</span></label>
          <div class="input-wrap">
            <select class="form-control" id="loanTypeSelect" name="loan_type" required>
              <option value="" disabled selected>Select Loan Type</option>
              <option value="Buy New Home">Buy New Home</option>
              <option value="Home Construction">Home Construction</option>
              <option value="Business Loan">Business Loan</option>
              <option value="Personal Loan">Personal Loan</option>
              <option value="Loan Against Property">Loan Against Property</option>
              <option value="Secured Business Loan">Secured Business Loan</option>
              <option value="Used Car Loan">Used Car Loan</option>
              <option value="Loan Against Securities">Loan Against Securities</option>
              <option value="Insurance Services">Insurance Services</option>
            </select>
            <span class="arrow">⌄</span>
          </div>
        </div>

        <div class="form-group">
          <label>I need loan amount of <span class="required">*</span></label>
          <div class="input-wrap">
            <input type="number" class="form-control" name="loan_amount" placeholder="₹" min="1" required>
          </div>
        </div>

        <div class="form-group">
          <label>Full Name<span class="required">*</span></label>
          <div class="input-wrap">
            <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" required>
          </div>
        </div>

        <div class="form-group">
          <label>Contact Number<span class="required">*</span></label>
          <div class="input-wrap">
            <input
              type="tel"
              class="form-control"
              name="contact_number"
              placeholder="Enter Mobile Number"
              maxlength="10"
              pattern="[0-9]{10}"
              oninput="this.value=this.value.replace(/[^0-9]/g,'')"
              required
            >
          </div>
        </div>

        <div class="form-group full-width">
          <div class="employment-title">I am</div>
          <div class="employment-options">
            <div class="radio-card">
              <input type="radio" id="salaried" name="employment_type" value="Salaried" checked>
              <label for="salaried" class="radio-label">
                <div class="radio-left">
                  <span class="radio-dot"></span>
                  <span>Salaried</span>
                </div>
              </label>
            </div>

            <div class="radio-card">
              <input type="radio" id="business" name="employment_type" value="Doing business">
              <label for="business" class="radio-label">
                <div class="radio-left">
                  <span class="radio-dot"></span>
                  <span>Doing business</span>
                </div>
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Income<span class="required">*</span></label>
          <div class="input-wrap">
            <input type="number" class="form-control" name="monthly_income" placeholder="₹" min="1" required>
          </div>
        </div>

        <div class="form-group">
          <label>Date of Birth<span class="required">*</span></label>
          <div class="input-wrap">
            <input type="date" class="form-control" name="date_of_birth" required>
          </div>
        </div>

        <div class="form-group">
          <label>Zip Code <span class="required">*</span></label>
          <div class="input-wrap">
            <input
              type="text"
              class="form-control"
              name="zip_code"
              id="zipCodeInput"
              placeholder="Enter 6 Digit Zip Code"
              maxlength="6"
              pattern="[0-9]{6}"
              oninput="this.value=this.value.replace(/[^0-9]/g,'')"
              required
            >
            <small id="zipStatus" class="zip-status">Enter 6 digit zip code</small>
          </div>
        </div>

        <div class="form-group">
          <label>City <span class="required">*</span></label>
          <div class="input-wrap">
            <input
              type="text"
              class="form-control"
              name="city"
              id="cityInput"
              placeholder="City auto fill by Zip Code"
              readonly
              required
            >
          </div>
        </div>

        <div class="form-group">
          <label>State <span class="required">*</span></label>
          <div class="input-wrap">
            <input
              type="text"
              class="form-control"
              name="state"
              id="stateInput"
              placeholder="State auto fill by Zip Code"
              readonly
              required
            >
          </div>
        </div>
      </div>

      <div class="checkbox-row">
        <input type="checkbox" id="terms" name="terms_accepted" value="1" required>
        <label for="terms">I accept the</label>
        <a href="#">terms and conditions</a>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</div>

<!-- LOAN CALCULATORS -->
<section class="calculator-section" id="calculator-section">
  <div class="calculator-container">
    <h2 class="calculator-title">Loan Calculators</h2>
    <p class="calculator-subtitle">Check your monthly EMI and SIP maturity instantly.</p>

    <div class="calculator-grid">
      <div class="calculator-card emi-card">
        <div class="calculator-content">
          <h3>EMI Calculator</h3>
          <button type="button" class="try-btn open-emi-modal">Try Now</button>
        </div>
      </div>

      <div class="calculator-card sip-card">
        <div class="calculator-content">
          <h3>SIP Calculator</h3>
          <button type="button" class="try-btn open-sip-modal">Try Now</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- EMI CALCULATOR MODAL -->
<div class="emi-modal" id="emiModal">
  <div class="emi-modal-box">
    <button class="emi-close-btn" id="emiCloseBtn" type="button">&times;</button>

    <div class="emi-calculator-box">
      <div class="emi-left">
        <h2 class="emi-title">EMI Calculator</h2>
        <p class="emi-subtitle">Calculate your monthly EMI, total interest and total amount payable.</p>

        <div class="emi-field">
          <div class="emi-field-top">
            <label>Loan amount</label>
            <div class="emi-value-box">
              <span>₹</span>
              <input type="number" id="loanAmountInput" value="1000000" placeholder="0">
            </div>
          </div>
          <input type="range" id="loanAmount"  value="1000000" placeholder="0">
        </div>

        <div class="emi-field">
          <div class="emi-field-top">
            <label>Rate of interest (p.a)</label>
            <div class="emi-value-box">
              <input type="number" id="interestRateInput" value="6.5" min="1" max="30" step="0.1">
              <span>%</span>
            </div>
          </div>
          <input type="range" id="interestRate" min="1" max="30" step="0.1" value="6.5">
        </div>

        <div class="emi-field">
          <div class="emi-field-top">
            <label>Loan tenure</label>
            <div class="emi-value-box">
              <input type="number" id="loanTenureInput" value="5" min="1" max="30" step="1">
              <span>Yr</span>
            </div>
          </div>
          <input type="range" id="loanTenure" min="1" max="30" step="1" value="5">
        </div>

        <div class="emi-results">
          <div class="emi-result-row">
            <span>Monthly EMI</span>
            <strong id="monthlyEmiValue">₹0</strong>
          </div>
          <div class="emi-result-row">
            <span>Principal amount</span>
            <strong id="principalValue">₹0</strong>
          </div>
          <div class="emi-result-row">
            <span>Total interest</span>
            <strong id="totalInterestValue">₹0</strong>
          </div>
          <div class="emi-result-row">
            <span>Total amount</span>
            <strong id="totalAmountValue">₹0</strong>
          </div>
        </div>
      </div>

      <div class="emi-right">
        <div class="emi-legend">
          <div class="legend-item">
            <span class="legend-color principal-color"></span>
            <span>Principal amount</span>
          </div>
          <div class="legend-item">
            <span class="legend-color interest-color"></span>
            <span>Interest amount</span>
          </div>
        </div>

        <div class="emi-chart-wrap">
          <div class="emi-chart" id="emiChart">
            <div class="emi-chart-inner"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SIP CALCULATOR MODAL -->
<div class="sip-modal" id="sipModal">
  <div class="sip-modal-box">
    <button class="sip-close-btn" id="sipCloseBtn" type="button">&times;</button>

    <div class="sip-calculator-box">
      <div class="sip-left">
        <h2 class="sip-title">SIP Calculator</h2>
        <p class="sip-subtitle">Calculate your monthly SIP, estimated returns and total future value.</p>

        <div class="sip-tabs">
          <button type="button" class="sip-tab-btn active" id="sipTab">SIP</button>
          <button type="button" class="sip-tab-btn" id="lumpsumTab">Lumpsum</button>
        </div>

        <div class="sip-field">
          <div class="sip-field-top">
            <label id="sipInvestmentLabel">Monthly investment</label>
            <div class="sip-value-box">
              <span>₹</span>
              <input type="number" id="sipInvestmentInput" value="25000" placeholder="0">
            </div>
          </div>
          <input type="range" id="sipInvestmentRange" value="25000" placeholder="0">
        </div>
        <div class="sip-field">
          <div class="sip-field-top">
            <label>Expected return rate (p.a)</label>
            <div class="sip-value-box">
              <input type="number" id="sipRateInput" value="12" min="1" max="30" step="0.1">
              <span>%</span>
            </div>
          </div>
          <input type="range" id="sipRateRange" min="1" max="30" step="0.1" value="12">
        </div>

        <div class="sip-field">
          <div class="sip-field-top">
            <label>Time period</label>
            <div class="sip-value-box">
              <input type="number" id="sipTenureInput" value="10" min="1" max="40" step="1">
              <span>Yr</span>
            </div>
          </div>
          <input type="range" id="sipTenureRange" min="1" max="40" step="1" value="10">
        </div>

        <div class="sip-results">
          <div class="sip-result-row">
            <span>Invested amount</span>
            <strong id="sipInvestedValue">₹0</strong>
          </div>
          <div class="sip-result-row">
            <span>Est. returns</span>
            <strong id="sipReturnsValue">₹0</strong>
          </div>
          <div class="sip-result-row">
            <span>Total value</span>
            <strong id="sipTotalValue">₹0</strong>
          </div>
        </div>

        <div class="sip-action">
          <button type="button" class="sip-invest-btn open-loan-modal" data-loan="Investment Plan">INVEST NOW</button>
        </div>
      </div>

      <div class="sip-right">
        <div class="sip-legend">
          <div class="legend-item">
            <span class="legend-color sip-invested-color"></span>
            <span>Invested amount</span>
          </div>
          <div class="legend-item">
            <span class="legend-color sip-return-color"></span>
            <span>Est. returns</span>
          </div>
        </div>

        <div class="sip-chart-wrap">
          <div class="sip-chart" id="sipChart">
            <div class="sip-chart-inner"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PIRAMAL GROUP -->
<section class="piramal-section">
  <div class="container">
    <h2 class="section-title">GV Finance Group since 1980</h2>
    <p class="section-subtitle">A name you can trust</p>

    <div class="stats-grid">
      <div class="stat-card">
        <div class="icon-circle">
          <i class="fa-solid fa-handshake"></i>
        </div>
        <div class="stat-label">Parentage of</div>
        <div class="stat-value">40+ years</div>
      </div>

      <div class="stat-card">
        <div class="icon-circle">
          <i class="fa-solid fa-award"></i>
        </div>
        <div class="stat-label">More than</div>
        <div class="stat-value">5+ million customers</div>
      </div>

      <div class="stat-card">
        <div class="icon-circle">
          <i class="fa-solid fa-location-dot"></i>
        </div>
        <div class="stat-label">Presence in</div>
        <div class="stat-value">500+ branches</div>
      </div>

      <div class="stat-card">
        <div class="icon-circle">
          <i class="fa-solid fa-building-circle-check"></i>
        </div>
        <div class="stat-label">More than</div>
        <div class="stat-value">5K+ partner outlets</div>
      </div>
    </div>

    <a href="about.php" class="cta-btn">Know More About GV Finance Group</a>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section">
  <div class="why-choose-container">
    <h2 class="why-title">Why Choose Us?</h2>

    <p class="why-text">
      Piramal Finance Limited (formerly known as Piramal Capital &amp; Housing Finance Limited) at its core, believes we are a company that is of the people of Bharat and for the people of Bharat. Our story has been one of steady change. We entered the retail finance area with housing finances and now offer business loans and personal loans. We use customer feedback and new market opportunities to create long-term, value-driven financial services. At Piramal Finance, we put an emphasis on digitisation and online lending, while still giving our valued customers a human touch and expanding branches all over Bharat. We have come a long way already and want to keep going.
    </p>

    <p class="why-text why-highlight">
      Our customized home loan solutions simplify your home-buying experience. Here is why Piramal Finance has emerged as the leading
      <span>home loan provider in India:</span>
    </p>

    <div class="why-grid">
      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/Simple.png" alt="Simple Application Process">
        </div>
        <h3>Simple &amp; Easy<br>Application Process</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/Faster_loan.png" alt="Faster Loan Processing">
        </div>
        <h3>Faster Loan<br> Processing</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/sanction.png" alt="Quick Sanction and Disbursals">
        </div>
        <h3>Quick Sanction &amp;<br>Disbursals</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/Customized.png" alt="Customised Interest Rates">
        </div>
        <h3>Customised Interest Rates</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/No_hidden.png" alt="No Hidden Charges">
        </div>
        <h3>No Hidden Charges</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/complete_online.png" alt="Complete Online Process">
        </div>
        <h3>Complete Online<br> Process</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/Flexible.png" alt="Flexible Repayment Options">
        </div>
        <h3>Flexible and Easy<br>Repayment Options</h3>
      </div>

      <div class="why-card">
        <div class="why-icon-circle">
          <img src="img/paperwork.png" alt="Minimum Paperwork">
        </div>
        <h3>Minimum<br> Paperwork</h3>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT SECTION -->
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

<!-- MISSION & VISION -->
<section class="mission-vision-section">
  <div class="mv-container">
    <div class="mv-heading">
      <h2>Mission & Vision</h2>
      <p>We are committed to making loan services simple, transparent, and accessible for every customer.</p>
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

<!-- HAPPY CUSTOMERS -->
<section class="happy-customers-section">
  <div class="happy-customers-container">
    <h2 class="happy-title">Our Happy Customers</h2>

    <div class="happy-slider">
      <div class="happy-slide active">
        <div class="happy-visual-wrap">
          <div class="main-customer-circle">
            <img src="img/client3.jpg" alt="Happy Customer">
          </div>

          <div class="floating-avatar avatar-1"><img src="img/client6.jpg" alt=""></div>
          <div class="floating-avatar avatar-2"><img src="img/client8.jpg" alt=""></div>
          <div class="floating-avatar avatar-3"><img src="img/client2.jpg" alt=""></div>
          <div class="floating-avatar avatar-4"><img src="img/client4.jpg" alt=""></div>

          <span class="confetti confetti-1"></span>
          <span class="confetti confetti-2"></span>
          <span class="confetti confetti-3"></span>
          <span class="confetti confetti-4"></span>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">
            The process was smooth and transparent. I got clear guidance at every step and my loan was approved faster than expected.
          </p>
          <h3 class="customer-name">Rahul Sharma</h3>
          <p class="customer-location">Mumbai, Maharashtra</p>
        </div>
      </div>

      <div class="happy-slide">
        <div class="happy-visual-wrap">
          <div class="main-customer-circle">
            <img src="img/client7.jpg" alt="Happy Customer">
          </div>

          <div class="floating-avatar avatar-1"><img src="img/client4.jpg" alt=""></div>
          <div class="floating-avatar avatar-2"><img src="img/client7.jpg" alt=""></div>
          <div class="floating-avatar avatar-3"><img src="img/client3.jpg" alt=""></div>
          <div class="floating-avatar avatar-4"><img src="img/client4.jpg" alt=""></div>

          <span class="confetti confetti-1"></span>
          <span class="confetti confetti-2"></span>
          <span class="confetti confetti-3"></span>
          <span class="confetti confetti-4"></span>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">
            Very professional support team. They helped me compare multiple options and choose the right loan for my business requirements.
          </p>
          <h3 class="customer-name">Neha Patel</h3>
          <p class="customer-location">Ahmedabad, Gujarat</p>
        </div>
      </div>

      <div class="happy-slide">
        <div class="happy-visual-wrap">
          <div class="main-customer-circle">
            <img src="img/Client2.jpg" alt="Happy Customer">
          </div>

          <div class="floating-avatar avatar-1"><img src="img/client6.jpg" alt=""></div>
          <div class="floating-avatar avatar-2"><img src="img/client7.jpg" alt=""></div>
          <div class="floating-avatar avatar-3"><img src="img/client5.jpg" alt=""></div>
          <div class="floating-avatar avatar-4"><img src="img/client4.jpg" alt=""></div>

          <span class="confetti confetti-1"></span>
          <span class="confetti confetti-2"></span>
          <span class="confetti confetti-3"></span>
          <span class="confetti confetti-4"></span>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">
            Excellent experience. Minimal documentation, quick response and the EMI calculator helped me plan my finances properly.
          </p>
          <h3 class="customer-name">Amit Verma</h3>
          <p class="customer-location">Pune, Maharashtra</p>
        </div>
      </div>

      <div class="happy-dots" id="happyDots">
        <span class="happy-dot active" data-index="0"></span>
        <span class="happy-dot" data-index="1"></span>
        <span class="happy-dot" data-index="2"></span>
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
  /* ================= ZIP CODE AUTO LOCATION ================= */
  const zipCodeInput = document.getElementById("zipCodeInput");
  const stateInput = document.getElementById("stateInput");
  const cityInput = document.getElementById("cityInput");
  const zipStatus = document.getElementById("zipStatus");

  function clearLocationFields() {
    if (stateInput) stateInput.value = "";
    if (cityInput) cityInput.value = "";
  }

  function setZipStatus(message, color = "#6b7280") {
    if (zipStatus) {
      zipStatus.textContent = message;
      zipStatus.style.color = color;
    }
  }

  async function fetchLocationByPincode(pinCode) {
    const response = await fetch(`https://api.postalpincode.in/pincode/${pinCode}`);
    const data = await response.json();

    if (!Array.isArray(data) || !data[0] || data[0].Status !== "Success" || !data[0].PostOffice || !data[0].PostOffice.length) {
      return null;
    }

    const office = data[0].PostOffice[0];

    return {
      state: office.State || "",
      city: office.District || ""
    };
  }

  let zipFetchTimer = null;

  if (zipCodeInput && stateInput && cityInput) {
    zipCodeInput.addEventListener("input", function () {
      const zip = this.value.trim();

      clearLocationFields();

      if (zip.length === 0) {
        setZipStatus("Enter 6 digit zip code");
        return;
      }

      if (zip.length < 6) {
        setZipStatus("Waiting for complete zip code...");
        return;
      }

      if (zip.length !== 6) {
        setZipStatus("Please enter valid 6 digit zip code", "#dc2626");
        return;
      }

      setZipStatus("Fetching location...", "#2563eb");

      clearTimeout(zipFetchTimer);

      zipFetchTimer = setTimeout(async () => {
        try {
          const result = await fetchLocationByPincode(zip);

          if (result) {
            stateInput.value = result.state || "";
            cityInput.value = result.city || "";
            setZipStatus("Location auto-filled successfully", "#16a34a");
          } else {
            clearLocationFields();
            setZipStatus("No location found for this zip code", "#dc2626");
          }
        } catch (error) {
          clearLocationFields();
          setZipStatus("Unable to fetch location. Please try again.", "#dc2626");
        }
      }, 300);
    });
  }

  /* ================= MOBILE MENU ================= */
  const burger = document.getElementById("burger");
  const menu = document.getElementById("menu");

  if (burger && menu) {
    burger.addEventListener("click", function () {
      menu.classList.toggle("is-open");
    });
  }

  /* ================= HERO SLIDER ================= */
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".dot");
  let currentSlide = 0;
  let heroInterval;

  function showSlide(index){
    slides.forEach((slide, i) => slide.classList.toggle("active", i === index));
    dots.forEach((dot, i) => dot.classList.toggle("active", i === index));
    currentSlide = index;
  }

  function nextSlide(){
    let next = currentSlide + 1;
    if(next >= slides.length) next = 0;
    showSlide(next);
  }

  function startHeroSlider(){
    clearInterval(heroInterval);
    heroInterval = setInterval(nextSlide, 4000);
  }

  dots.forEach(dot => {
    dot.addEventListener("click", function(){
      const index = parseInt(this.getAttribute("data-slide"), 10);
      showSlide(index);
      startHeroSlider();
    });
  });

  startHeroSlider();

  /* ================= APPLY LOAN MODAL ================= */
  const loanModal = document.getElementById("loanModal");
  const closeLoanModal = document.getElementById("closeLoanModal");
  const openLoanButtons = document.querySelectorAll(".open-loan-modal");
  const loanTypeSelect = document.getElementById("loanTypeSelect");

  function openLoanModalFn(loanType = "") {
    if (loanTypeSelect && loanType) {
      const optionExists = [...loanTypeSelect.options].some(option => option.value === loanType);
      if (optionExists) {
        loanTypeSelect.value = loanType;
      }
    }
    if (loanModal) {
      loanModal.classList.add("show");
      document.body.classList.add("modal-open");
    }
  }

  function closeLoanModalFn() {
    if (loanModal) {
      loanModal.classList.remove("show");
      document.body.classList.remove("modal-open");
    }
  }

  openLoanButtons.forEach(btn => {
    btn.addEventListener("click", function () {
      const loanType = this.getAttribute("data-loan") || "";
      openLoanModalFn(loanType);
    });
  });

  if (closeLoanModal) {
    closeLoanModal.addEventListener("click", closeLoanModalFn);
  }

  if (loanModal) {
    loanModal.addEventListener("click", function (e) {
      if (e.target === loanModal) {
        closeLoanModalFn();
      }
    });
  }

  /* ================= EMI MODAL ================= */
  const emiModal = document.getElementById("emiModal");
  const emiCloseBtn = document.getElementById("emiCloseBtn");
  const openEmiButtons = document.querySelectorAll(".open-emi-modal");

  function openEmiModalFn() {
    if (emiModal) {
      emiModal.classList.add("show");
      document.body.classList.add("modal-open");
    }
  }

  function closeEmiModalFn() {
    if (emiModal) {
      emiModal.classList.remove("show");
      document.body.classList.remove("modal-open");
    }
  }

  openEmiButtons.forEach(btn => {
    btn.addEventListener("click", openEmiModalFn);
  });

  if (emiCloseBtn) {
    emiCloseBtn.addEventListener("click", closeEmiModalFn);
  }

  if (emiModal) {
    emiModal.addEventListener("click", function (e) {
      if (e.target === emiModal) {
        closeEmiModalFn();
      }
    });
  }

  /* ================= SIP MODAL ================= */
  const sipModal = document.getElementById("sipModal");
  const sipCloseBtn = document.getElementById("sipCloseBtn");
  const openSipButtons = document.querySelectorAll(".open-sip-modal");

  function openSipModalFn() {
    if (sipModal) {
      sipModal.classList.add("show");
      document.body.classList.add("modal-open");
    }
  }

  function closeSipModalFn() {
    if (sipModal) {
      sipModal.classList.remove("show");
      document.body.classList.remove("modal-open");
    }
  }

  openSipButtons.forEach(btn => {
    btn.addEventListener("click", openSipModalFn);
  });

  if (sipCloseBtn) {
    sipCloseBtn.addEventListener("click", closeSipModalFn);
  }

  if (sipModal) {
    sipModal.addEventListener("click", function (e) {
      if (e.target === sipModal) {
        closeSipModalFn();
      }
    });
  }

  document.addEventListener("keydown", function(e){
    if(e.key === "Escape"){
      if (emiModal && emiModal.classList.contains("show")) closeEmiModalFn();
      if (sipModal && sipModal.classList.contains("show")) closeSipModalFn();
      if (loanModal && loanModal.classList.contains("show")) closeLoanModalFn();
    }
  });

  /* ================= FORMAT ================= */
  function formatINR(value) {
    return "₹" + Number(value || 0).toLocaleString("en-IN", {
      maximumFractionDigits: 0
    });
  }

  function updateRangeBackground(rangeEl) {
    const min = parseFloat(rangeEl.min);
    const max = parseFloat(rangeEl.max);
    const val = parseFloat(rangeEl.value);
    const percent = ((val - min) / (max - min)) * 100;
    rangeEl.style.background = `linear-gradient(to right, #11b886 0%, #11b886 ${percent}%, #e6e6ea ${percent}%, #e6e6ea 100%)`;
  }

  function syncRangeAndInput(rangeEl, inputEl, callback) {
    rangeEl.addEventListener("input", function () {
      inputEl.value = rangeEl.value;
      updateRangeBackground(rangeEl);
      callback();
    });

    inputEl.addEventListener("input", function () {
      let value = parseFloat(inputEl.value);
      if (isNaN(value)) return;

      const min = parseFloat(rangeEl.min);
      const max = parseFloat(rangeEl.max);

      if (value < min) value = min;
      if (value > max) value = max;

      rangeEl.value = value;
      inputEl.value = value;
      updateRangeBackground(rangeEl);
      callback();
    });

    inputEl.addEventListener("blur", function () {
      let value = parseFloat(inputEl.value);
      if (isNaN(value)) value = parseFloat(rangeEl.min);

      const min = parseFloat(rangeEl.min);
      const max = parseFloat(rangeEl.max);

      if (value < min) value = min;
      if (value > max) value = max;

      rangeEl.value = value;
      inputEl.value = value;
      updateRangeBackground(rangeEl);
      callback();
    });
  }

  /* ================= EMI CALCULATOR ================= */
  const loanAmountRange = document.getElementById("loanAmount");
  const interestRateRange = document.getElementById("interestRate");
  const loanTenureRange = document.getElementById("loanTenure");

  const loanAmountInput = document.getElementById("loanAmountInput");
  const interestRateInput = document.getElementById("interestRateInput");
  const loanTenureInput = document.getElementById("loanTenureInput");

  const monthlyEmiValue = document.getElementById("monthlyEmiValue");
  const principalValue = document.getElementById("principalValue");
  const totalInterestValue = document.getElementById("totalInterestValue");
  const totalAmountValue = document.getElementById("totalAmountValue");
  const emiChart = document.getElementById("emiChart");

  function calculateEMI() {
    let principal = parseFloat(loanAmountInput.value) || 0;
    let annualRate = parseFloat(interestRateInput.value) || 0;
    let years = parseFloat(loanTenureInput.value) || 0;

    principal = Math.max(principal, 0);
    annualRate = Math.max(annualRate, 0);
    years = Math.max(years, 0);

    const monthlyRate = annualRate / 12 / 100;
    const months = Math.round(years * 12);

    let emi = 0;

    if (months > 0 && principal > 0) {
      if (monthlyRate === 0) {
        emi = principal / months;
      } else {
        const factor = Math.pow(1 + monthlyRate, months);
        emi = (principal * monthlyRate * factor) / (factor - 1);
      }
    }

    const totalAmount = emi * months;
    const totalInterest = totalAmount - principal;

    monthlyEmiValue.textContent = formatINR(Math.round(emi));
    principalValue.textContent = formatINR(Math.round(principal));
    totalInterestValue.textContent = formatINR(Math.max(0, Math.round(totalInterest)));
    totalAmountValue.textContent = formatINR(Math.round(totalAmount));

    let interestAngle = 0;
    if (totalAmount > 0) {
      interestAngle = (totalInterest / totalAmount) * 360;
    }

    emiChart.style.background = `conic-gradient(#5568ef 0deg ${interestAngle}deg, #dfe2f0 ${interestAngle}deg 360deg)`;
  }

  syncRangeAndInput(loanAmountRange, loanAmountInput, calculateEMI);
  syncRangeAndInput(interestRateRange, interestRateInput, calculateEMI);
  syncRangeAndInput(loanTenureRange, loanTenureInput, calculateEMI);

  updateRangeBackground(loanAmountRange);
  updateRangeBackground(interestRateRange);
  updateRangeBackground(loanTenureRange);
  calculateEMI();

  /* ================= SIP CALCULATOR ================= */
  const sipTab = document.getElementById("sipTab");
  const lumpsumTab = document.getElementById("lumpsumTab");

  const sipInvestmentRange = document.getElementById("sipInvestmentRange");
  const sipRateRange = document.getElementById("sipRateRange");
  const sipTenureRange = document.getElementById("sipTenureRange");

  const sipInvestmentInput = document.getElementById("sipInvestmentInput");
  const sipRateInput = document.getElementById("sipRateInput");
  const sipTenureInput = document.getElementById("sipTenureInput");

  const sipInvestmentLabel = document.getElementById("sipInvestmentLabel");
  const sipInvestedValue = document.getElementById("sipInvestedValue");
  const sipReturnsValue = document.getElementById("sipReturnsValue");
  const sipTotalValue = document.getElementById("sipTotalValue");
  const sipChart = document.getElementById("sipChart");

  let sipMode = "sip";

  function calculateSIPValues(monthlyInvestment, annualRate, years) {
    const annualRateDecimal = annualRate / 100;
    const monthlyRate = Math.pow(1 + annualRateDecimal, 1 / 12) - 1;
    const months = Math.round(years * 12);

    let futureValue = 0;

    if (months > 0 && monthlyInvestment > 0) {
      if (monthlyRate === 0) {
        futureValue = monthlyInvestment * months;
      } else {
        futureValue =
          monthlyInvestment *
          (((Math.pow(1 + monthlyRate, months) - 1) / monthlyRate) * (1 + monthlyRate));
      }
    }

    const invested = monthlyInvestment * months;
    const returns = futureValue - invested;

    return {
      invested,
      returns,
      total: futureValue
    };
  }

  function calculateLumpsumValues(principal, annualRate, years) {
    const total = principal * Math.pow(1 + (annualRate / 100), years);
    const returns = total - principal;

    return {
      invested: principal,
      returns,
      total
    };
  }

  function calculateSIPCalculator() {
    let investment = parseFloat(sipInvestmentInput.value) || 0;
    let annualRate = parseFloat(sipRateInput.value) || 0;
    let years = parseFloat(sipTenureInput.value) || 0;

    investment = Math.max(investment, 0);
    annualRate = Math.max(annualRate, 0);
    years = Math.max(years, 0);

    let result;

    if (sipMode === "sip") {
      result = calculateSIPValues(investment, annualRate, years);
    } else {
      result = calculateLumpsumValues(investment, annualRate, years);
    }

    sipInvestedValue.textContent = formatINR(Math.round(result.invested));
    sipReturnsValue.textContent = formatINR(Math.max(0, Math.round(result.returns)));
    sipTotalValue.textContent = formatINR(Math.round(result.total));

    let returnAngle = 0;
    if (result.total > 0) {
      returnAngle = (result.returns / result.total) * 360;
    }

    sipChart.style.background =
      `conic-gradient(#5568ef 0deg ${returnAngle}deg, #dfe2f0 ${returnAngle}deg 360deg)`;
  }

  function syncSipRangeAndInput(rangeEl, inputEl, callback) {
    rangeEl.addEventListener("input", function () {
      inputEl.value = rangeEl.value;
      updateRangeBackground(rangeEl);
      callback();
    });

    inputEl.addEventListener("input", function () {
      let value = parseFloat(inputEl.value);
      if (isNaN(value)) return;

      const min = parseFloat(rangeEl.min);
      const max = parseFloat(rangeEl.max);

      if (value < min) value = min;
      if (value > max) value = max;

      rangeEl.value = value;
      inputEl.value = value;
      updateRangeBackground(rangeEl);
      callback();
    });

    inputEl.addEventListener("blur", function () {
      let value = parseFloat(inputEl.value);
      if (isNaN(value)) value = parseFloat(rangeEl.min);

      const min = parseFloat(rangeEl.min);
      const max = parseFloat(rangeEl.max);

      if (value < min) value = min;
      if (value > max) value = max;

      rangeEl.value = value;
      inputEl.value = value;
      updateRangeBackground(rangeEl);
      callback();
    });
  }

  function updateSipRangeLimits() {
    if (sipMode === "sip") {
      sipInvestmentLabel.textContent = "Monthly investment";
      
      sipInvestmentInput.value = 25000;
      sipInvestmentRange.value = 25000;
    } else {
      sipInvestmentLabel.textContent = "Total investment";
      
      sipInvestmentInput.value = 100000;
      sipInvestmentRange.value = 100000;
    }

    let value = parseFloat(sipInvestmentInput.value) || parseFloat(sipInvestmentRange.min);
    const min = parseFloat(sipInvestmentRange.min);
    const max = parseFloat(sipInvestmentRange.max);

    if (value < min) value = min;
    if (value > max) value = max;

    sipInvestmentInput.value = value;
    sipInvestmentRange.value = value;

    updateRangeBackground(sipInvestmentRange);
  }

  syncSipRangeAndInput(sipInvestmentRange, sipInvestmentInput, calculateSIPCalculator);
  syncSipRangeAndInput(sipRateRange, sipRateInput, calculateSIPCalculator);
  syncSipRangeAndInput(sipTenureRange, sipTenureInput, calculateSIPCalculator);

  sipTab.addEventListener("click", function() {
    sipMode = "sip";
    sipTab.classList.add("active");
    lumpsumTab.classList.remove("active");
    updateSipRangeLimits();
    calculateSIPCalculator();
  });

  lumpsumTab.addEventListener("click", function() {
    sipMode = "lumpsum";
    lumpsumTab.classList.add("active");
    sipTab.classList.remove("active");
    updateSipRangeLimits();
    calculateSIPCalculator();
  });

  updateSipRangeLimits();
  updateRangeBackground(sipRateRange);
  updateRangeBackground(sipTenureRange);
  calculateSIPCalculator();

  /* ================= HAPPY CUSTOMERS SLIDER ================= */
  const happySlides = document.querySelectorAll(".happy-slide");
  const happyDots = document.querySelectorAll(".happy-dot");
  let happyIndex = 0;
  let happyInterval;

  function showHappySlide(index){
    if(index < 0) index = happySlides.length - 1;
    if(index >= happySlides.length) index = 0;

    happySlides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });

    happyDots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });

    happyIndex = index;
  }

  function nextHappySlide(){
    showHappySlide(happyIndex + 1);
  }

  function startHappySlider(){
    clearInterval(happyInterval);
    happyInterval = setInterval(nextHappySlide, 4500);
  }

  happyDots.forEach(dot => {
    dot.addEventListener("click", function(){
      const index = parseInt(this.getAttribute("data-index"), 10);
      showHappySlide(index);
      startHappySlider();
    });
  });

  startHappySlider();
</script>

</body>
</html>