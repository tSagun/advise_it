<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advise-It! Planning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <h1>Advise-It Planning</h1>
  <h2>Plan ID: {{@plan_id}}</h2>
  <h2>Last Update was made on: <span id="date">{{@date}} UTC</span></h2>
  <h2>{{@plan}}</h2>
  <form id="planForm" method="post">
      <div class="card">
          <label for="fall">Fall</label>
          <textarea id="fall" name="fall">{{@fall}}</textarea>
      </div>
      <div class="card">
          <label for="winter">Winter</label>
          <textarea id="winter" name="winter">{{@winter}}</textarea>
      </div>
      <div class="card">
          <label for="spring">Spring</label>
          <textarea id="spring" name="spring">{{@spring}}</textarea>
      </div>
      <div class="card">
          <label for="summer">Summer</label>
          <textarea id="summer" name="summer">{{@summer}}</textarea>
      </div>
      <button type="submit" form="planForm" class="btn-primary rounded">Submit Plan</button>
  </form>
  <div class="modal fade" id="confirmModal">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Plan has been saved.</h4>
              </div>
              <p>Thank you for using Advise-It. Your plan was saved at: <span id="modalDate"></span></p>
          </div>
      </div>
  </div>
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $("#planForm").submit(function (e)
    {
        e.preventDefault();

        let form = $(this);
        console.log("planId={{@plan_id}}&".concat(form.serialize()));
        $.ajax
        ({
            type: "POST",
            url: "model/saveplan.php",
            data: "planId={{@plan_id}}&".concat(form.serialize()),
            success: function (result) {
                console.log(result);
                result = result.concat(" UTC");
                $("#date").html(result);
                $("#modalDate").html(result);
                $("#confirmModal").modal("toggle");
            }
        })
    })
</script>
</body>
</html>