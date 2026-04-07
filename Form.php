<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apply Loan Form</title>
  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body{
      background:#0b2239;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:20px;
    }

    .loan-popup{
      width:100%;
      max-width:780px;
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
      width:46px;
      height:46px;
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
    }

    .form-control::placeholder{
      color:#aab3bc;
    }

    select.form-control{
      appearance:none;
      -webkit-appearance:none;
      -moz-appearance:none;
      color:#aab3bc;
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

    .input-icon{
      position:absolute;
      right:8px;
      top:50%;
      transform:translateY(-50%);
      color:#7d7d7d;
      font-size:20px;
      pointer-events:none;
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
    }

    .loan-popup{
     width:100%;
     max-width:600px;
}


.text-with-icon{
  display:inline-flex;
  align-items:center;
  gap:10px;
}

.small-icon{
  width:22px;
  height:22px;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  color:currentColor;
  flex-shrink:0;
}

.small-icon svg{
  width:100%;
  height:100%;
  display:block;
}


</style>
</head>
<body>

  <div class="loan-modal" id="loanModal">
  <div class="loan-popup">
    <button class="close-btn" id="closeLoanModal" type="button">&times;</button>

    <div class="form-header">
      <div class="icon-box">₹</div>
      <h2>Apply Loan In A Minute</h2>
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
          <label>My full name is <span class="required">*</span></label>
          <div class="input-wrap">
            <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" required>
          </div>
        </div>

        <div class="form-group">
          <label>My contact number is <span class="required">*</span></label>
          <div class="input-wrap">
            <input type="tel" class="form-control" name="contact_number" placeholder="Enter Mobile Number" maxlength="15" required>
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
          <label>My monthly income is <span class="required">*</span></label>
          <div class="input-wrap">
            <input type="number" class="form-control" name="monthly_income" placeholder="₹" min="1" required>
          </div>
        </div>

        <div class="form-group">
          <label>My date of birth is <span class="required">*</span></label>
          <div class="input-wrap">
            <input type="date" class="form-control" name="date_of_birth" required>
          </div>
        </div>

        <div class="form-group">
          <label>State <span class="required">*</span></label>
          <div class="input-wrap">
            <select class="form-control" name="state" required>
              <option value="" disabled selected>Select State</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Delhi">Delhi</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
            </select>
            <span class="arrow">⌄</span>
          </div>
        </div>

        <div class="form-group">
          <label>Branch <span class="required">*</span></label>
          <div class="input-wrap">
            <select class="form-control" name="branch" required>
              <option value="" disabled selected>Select Branch</option>
              <option value="Mumbai">Mumbai</option>
              <option value="Thane">Thane</option>
              <option value="Pune">Pune</option>
              <option value="Navi Mumbai">Navi Mumbai</option>
              <option value="Ahmedabad">Ahmedabad</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
            </select>
            <span class="arrow">⌄</span>
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


<script>
  const loanModal = document.getElementById("loanModal");
  const closeLoanModal = document.getElementById("closeLoanModal");

  closeLoanModal.addEventListener("click", function () {
      loanModal.style.display = "none";
  });
</script>

</body>
</html>