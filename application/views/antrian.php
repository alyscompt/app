 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>fcr/face-api.js"></script>

  
  <div class="row">
	<div class="col-md-12">
	<div class="col-md-6">
	<div class="box">
	<div class="loket row">
					Face
				</div>
				<div class="agenda row " >
				
        <video id="vidDisplay" style=" " class="col-md-12" onloadedmetadata="onPlay(this)" autoplay="true"></video>
        <canvas id="overlay" class="col-md-12" style="position: absolute; top: 0; left: 0;" />
     
				</div>
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="box">
	<div class="loket row">
					<center> <button id="register" class="btn btn-info" style="background-color:green; font-size:20px;"> PILIH LOKET </button>  </center>
				</div>
				<div class="agenda row">      
     
        <br><br><br>
        <!--<span style="margin-left: 120px; font-size: 30px; font-family:Lucida Console,Monaco,monospace; font-weight: bold;"> PILIHAN </span><br></br>-->
        <img id = "prof_img" style="display: none; border: 3px solid black; border-radius: 10px;" ></img><br><br>
        
        <div id="reg_disp" style="display: none;">
		
         
		<!--<button id="capture" class="button button1 btn btn-xl" style="background-color:green; color:#ffffff; width:100%; font-size:20px;"> LOKET PENDAFTARAN</button><br><br><br><br>
        <button id="capture1" class="button button1 btn btn-xl" style="background-color:blue; color:#ffffff;  width:100%; font-size:20px;"> LOKET INFORMASI </button><br><br><br><br>
		<button id="capture2" class="button button1 btn btn-xl" style="background-color:red; color:#ffffff;  width:100%; font-size:20px;"> LOKET PENGAMBILAN </button><br><br><br><br>
         -->
		 
		<button id="capture" class="button button1 btn btn-xl" style="background-color:green; color:#ffffff; width:100%; font-size:20px;"> Layanan 1</button><br><br><br><br>
        <button id="capture1" class="button button1 btn btn-xl" style="background-color:blue; color:#ffffff;  width:100%; font-size:20px;"> Layanan 2 </button><br><br><br><br>
		<button id="capture2" class="button button1 btn btn-xl" style="background-color:red; color:#ffffff;  width:100%; font-size:20px;"> Layanan 3 </button><br><br><br><br>
         
		 
	   </div>
	   
	 <!--  <a href="javascript:void(0)" onclick="add_langsung_bltdd(1)" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i>&nbsp; ss</a>
-->
     
				</div>
	</div>
	</div>
	
	 <div id="parent1">
     
	  
	 

     
       
       

      
     
    </div>
  
	</div>  
  </div>
  
	<!--<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="box">
				<div class="loket">
					Nomer Antrian Anda
				</div>
				<div class="agenda">
					<h1 id="nomer"><?php echo $antrian->row('no_antrian'); 
					if($antrian->row('no_antrian') < 1){
						$antri=0;
					}
					else{
						$antri=$antrian->row('no_antrian');
					}
					?>
					</h1>
						<center>
							<a href="<?php echo site_url('welcome/tambah_antrian/'.$antri.'/'.$antrian_rw->id_loket); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> &nbsp;Dapatkan Nomer Antrian</a>
						</center>
					<br>
				</div>
			</div>
		</div>
	</div>-->
	
	
	
<script type="text/javascript">
	function nomer(){
		var antri = parseInt(document.getElementById('nomer').innerHTML)+1;
		document.getElementById("nomer").innerHTML=antri;
	}
	function print_outantri(id){
  ajaxmodal('welcome/pop_print/'+id);
}
function ajaxmodal(urlnya)
{
		$('#ajax-modalin').load(urlnya, '', function(){
		$('#ajax-modal').modal();
		});
}

function processAjaxData(response, urlPath){
     document.getElementById("content").innerHTML = response.html;
     document.title = response.pageTitle;
     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
 }
</script>






<script>
  var waitingDialog = waitingDialog || (function ($) {
    var $dialog = $(
      '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
        '<div class="modal-dialog modal-m">' +
          '<div class="modal-content">' +
          '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
          '<div class="modal-body">' +
            '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
          '</div>' +
      '</div></div></div>');

  return {
    show: function (message, options) {
      if (typeof options === 'undefined') {
        options = {};
      }
      if (typeof message === 'undefined') {
        message = 'Loading';
      }
      var settings = $.extend({
        dialogSize: 'm',
        progressType: '',
        onHide: null 
      }, options);
      $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
      $dialog.find('.progress-bar').attr('class', 'progress-bar');
      if (settings.progressType) {
        $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
      }
      $dialog.find('h3').text(message);
      if (typeof settings.onHide === 'function') {
        $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
          settings.onHide.call($dialog);
        });
      }
      $dialog.modal();
    },
    hide: function () {
      $dialog.modal('hide');
    }
  };

})(jQuery);
</script>


<script>

  //----------------------------GLOBAL VARIABLE FOR FACE MATCHER------------------------------------
  var faceMatcher = undefined
  //----------------------------------------------------------------------------------------------

  waitingDialog.show('Initializing data....', {dialogSize: 'sm', progressType: 'success'})
  $("#parent1").hide();
  $("#parent2").hide();
  Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('/facercognation/7/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/facercognation/7/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('/facercognation/7/models'),
    faceapi.nets.tinyFaceDetector.loadFromUri('/facercognation/7/models')
  ]).then(start)

  async function start() {
    $.ajax({
        datatype: 'json',
        url: "http://localhost/facercognation/7/fetch.php",
        data: ""
    }).done(async function(data) {
        if(data.length > 2){
          var json_str = "{\"parent\":" + data  + "}"
          content = JSON.parse(json_str)
          for (var x = 0; x < Object.keys(content.parent).length; x++) {
            for (var y = 0; y < Object.keys(content.parent[x]._descriptors).length; y++) {
              var results = Object.values(content.parent[x]._descriptors[y])
              content.parent[x]._descriptors[y] = new Float32Array(results)
            }
          }
          faceMatcher = await createFaceMatcher(content);
        }
        waitingDialog.hide()
        $('#parent1').show()
        $('#parent2').show()        
        run();
    });
  }

  // Create Face Matcher
  async function createFaceMatcher(data) {
    const labeledFaceDescriptors = await Promise.all(data.parent.map(className => {
      const descriptors = [];
      for (var i = 0; i < className._descriptors.length; i++) {
        descriptors.push(className._descriptors[i]);
      }
      return new faceapi.LabeledFaceDescriptors(className._label, descriptors);
    }))
    return new faceapi.FaceMatcher(labeledFaceDescriptors,0.6);
  }


  async function onPlay() {
      const videoEl = $('#vidDisplay').get(0)
      if(videoEl.paused || videoEl.ended )
        return setTimeout(() => onPlay())

        $("#overlay").show()
        const canvas = $('#overlay').get(0)
        
        if($("#register").hasClass('active'))
        {
          const options = getFaceDetectorOptions()
          const result = await faceapi.detectSingleFace(videoEl, options)
          if (result) {
            const dims = faceapi.matchDimensions(canvas, videoEl, true)
            dims.height = 800
            dims.width = 1200
            canvas.height = 800
            canvas.width = 1200
            const resizedResult = faceapi.resizeResults(result, dims)
            faceapi.draw.drawDetections(canvas, resizedResult)  
          }     
          else{
            $("#overlay").hide()
          } 
        }

        if($("#login").hasClass('active'))
        {
          if(faceMatcher != undefined){
            //--------------------------FACE RECOGNIZE------------------
            const input = document.getElementById('vidDisplay')
            //const displaySize = { width: 1200, height: 800 }
            faceapi.matchDimensions(canvas, displaySize)
            const detections = await faceapi.detectAllFaces(input).withFaceLandmarks().withFaceDescriptors()
            const resizedDetections = faceapi.resizeResults(detections, displaySize)
            const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
            results.forEach((result, i) => {
                const box = resizedDetections[i].detection.box
                const drawBox = new faceapi.draw.DrawBox(box, { label: result.toString() })
                drawBox.draw(canvas)
                var str = result.toString()
                rating = parseFloat(str.substring(str.indexOf('(') + 1,str.indexOf(')')))
                str = str.substring(0, str.indexOf('('))
                str = str.substring(0, str.length - 1)
                if(str != "unknown"){
                  if(rating < 0.5){
                        if(str == $("#log_name").text()){
                            console.log("Match TRUE!")
                            match = true;
                            $("#logname").html(str)
                            $("#prof_img").attr('src',"http://localhost/facercognation/7/data/" + str + "/image0.png")
                        }
                    }  
                }
            })
            //---------------------------------------------------------------------  
          }
        }

      setTimeout(() => onPlay())
    }

  async function run() {
      const stream = await navigator.mediaDevices.getUserMedia({ video: {} })
      const videoEl = $('#vidDisplay').get(0)
      videoEl.srcObject = stream
  }
  
  // tiny_face_detector options
  let inputSize = 160
  let scoreThreshold = 0.4

  function getFaceDetectorOptions() {
    return  new faceapi.TinyFaceDetectorOptions({ inputSize, scoreThreshold });
  }

  async function load_neural(){
    waitingDialog.show('Initializing neural data....', {dialogSize: 'sm', progressType: 'success'})
    $.ajax({
        datatype: 'json',
        url: "http://localhost/facercognation/7/fetch.php",
        data: ""
    }).done(async function(data) {
        if(data.length > 2){
          var json_str = "{\"parent\":" + data  + "}"
          content = JSON.parse(json_str)
          console.log(content)
          for (var x = 0; x < Object.keys(content.parent).length; x++) {
            for (var y = 0; y < Object.keys(content.parent[x]._descriptors).length; y++) {
              var results = Object.values(content.parent[x]._descriptors[y]);
              content.parent[x]._descriptors[y] = new Float32Array(results);
            }
          }
          faceMatcher = await createFaceMatcher(content);
		  
        }
        waitingDialog.hide()
		alert(data)
    });
  }

</script>

<script>


  
  $(document).ready(async function(){

    var counter = 1;
    const descriptions = [];

    // -------------Initialize---------------
    $("#login").css('background-color','yellow');
    $("#login").addClass('active');
   
	 $("#register").addClass('btn btn-info');
    $("#register").removeClass('active');

    if($("#login").hasClass('active')){
        $("#reg_disp").hide();
        $("#log_disp").show();
    }
    else if($("#register").hasClass('active')){
        $("#reg_disp").show();
        $("#log_disp").hide();
    }
    //---------------------------------------


    $("#login").click(function(){
      $.ajax({
        datatype: 'json',
        url: "http://localhost/facercognation/7/fetch.php",
        data: ""
      }).done(function(data) {
          labeled = JSON.parse(data)
      });
      $(this).css('background-color','green')
      $("#register").css('background-color','white')
      $(this).addClass('active')
      $("#register").removeClass('active')
      $("#reg_disp").hide()
      $("#log_disp").show()
      $("#prof_img").removeAttr('src')
      $("#fname").val('')
   
      $("#logname").html('')
      $("#fname").prop("readonly", false)
    
      counter = 1
      description = []          
      $("#tries").html("Trials left : " + counter)        
    });

    $("#register").click(function(){
      $(this).css('background-color','green')
      $("#login").css('background-color','white')
      $(this).addClass('active')
      $("#login").removeClass('active')
      $("#reg_disp").show()
      $("#log_disp").hide()
      $("#prof_img").removeAttr('src')
      $("#fname").val('')
    
      $("#logname").html('')
      $("#fname").prop("readonly", false)
          
      counter = 1
      description = []                
      $("#tries").html("Trials left : " + counter)
    });

    $("#tries").html("Trials left : " + counter)

    $("#capture").click(async function(){
      var data = 'LOKET1';
      const label = data;         
       
        if(counter <= 1 && counter >= 0 ){
          var canvas = document.createElement('canvas');
          var context = canvas.getContext('2d');
          var video = document.getElementById('vidDisplay');
          context.drawImage(video, 0, 0, 600, 350);
          var capURL = canvas.toDataURL('image/png');
          var canvas2 = document.createElement('canvas');
          canvas2.width = 1200;
          canvas2.height = 800;
          var ctx = canvas2.getContext('2d');
          ctx.drawImage(video, 0, 0, 1200, 800);
          var new_image_url = canvas2.toDataURL();
          var img = document.createElement('img');
          img.src = new_image_url;
          document.getElementById("prof_img").src = img.src;

          const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
          if( detections != null){
            descriptions.push(detections.descriptor);
            var descrip = descriptions;
            counter--;
            $("#tries").html("Trials left : " + counter)
            if(counter == 0){
              // Save Image
              $.ajax({
                  type: "POST",
                  url: "http://localhost/facercognation/7/ajax.php",
                  data: {image: img.src ,path: data}
              }).done(function(o) {
                  console.log('Image Saved'); 
              });


              waitingDialog.show('Processing data.............', {dialogSize: 'sm', progressType: 'success'})
              var postData = new faceapi.LabeledFaceDescriptors(label, descrip);
			  
              $.ajax({
                  url: 'json.php',
                  type: 'POST',
                  data: { myData: JSON.stringify(postData) },
                  datatype: 'json'
              })
			  $.ajax({
				url: "<?php echo site_url();?>welcome/tambah_loket/1",
				//url: "saveto.php",
				type: "POST",
				data: {
					myData: JSON.stringify(postData)
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){						
						$("#success").show();
						$('#success').html('Data added successfully !'); 	
						alert("Data Added Successfully Gaes !");
					}
					else if(dataResult.statusCode==201)
					{
					   alert("Data Added Not Successfully Gaes !");
					}
					
				}
			})
              .done(async function (data) {
                  //load_neural()
                  //alert("Done GAES!")
                  console.log("Success!")
                  waitingDialog.hide()
                  counter = 1
                  $("#tries").html("Trials left : " + counter)
                  $("#fname").val('')
                
                  $("#prof_img").removeAttr('src')                  
                  $("#fname").prop("readonly", false)
                  
              })
              .fail(function (jqXHR, textStatus, errorThrown) { 
                  alert("Error due to internet connection! Please try again!");
              });
              const descriptions = [];
            }          
          }
          else{
            alert("No FACE detected!");
          }
        }
        else{
          alert("Done Learning!");
          counter = 1;
          const descriptions = [];
        }
      
   
    });
	
	
  
	
	 $("#capture1").click(async function(){
      var data = 'LOKET2';
      const label = data;         
       
        if(counter <= 1 && counter >= 0 ){
          var canvas = document.createElement('canvas');
          var context = canvas.getContext('2d');
          var video = document.getElementById('vidDisplay');
          context.drawImage(video, 0, 0, 600, 350);
          var capURL = canvas.toDataURL('image/png');
          var canvas2 = document.createElement('canvas');
          canvas2.width = 1200;
          canvas2.height = 800;
          var ctx = canvas2.getContext('2d');
          ctx.drawImage(video, 0, 0, 1200, 800);
          var new_image_url = canvas2.toDataURL();
          var img = document.createElement('img');
          img.src = new_image_url;
		  
          document.getElementById("prof_img").src = img.src;

          //const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
		  const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
		 // const detections = await faceapi.detectSingleFace(img) .withFaceLandmarks() .withFaceDescriptor();
		  let faceMatcher = new faceapi.FaceMatcher(detections);
          if( detections != null){
            descriptions.push(detections.descriptor);
            var descrip = descriptions;
            counter--;
            $("#tries").html("Trials left : " + counter)
            if(counter == 0){
              // Save Image
              $.ajax({
                  type: "POST",
                  url: "http://localhost/facercognation/7/ajax.php",
                  data: {image: img.src ,path: data}
              }).done(function(o) {
                  console.log('Image Saved'); 
              });


              waitingDialog.show('Processing data.............', {dialogSize: 'sm', progressType: 'success'})
              var postData = new faceapi.LabeledFaceDescriptors(label, descrip);
			 // var imgss = $_POST['image'];
              $.ajax({
                  url: 'json.php',
                  type: 'POST',
                  data: { myData: JSON.stringify(postData) },
                  datatype: 'json'
              })
			  $.ajax({				 
				url: "<?php echo site_url();?>welcome/tambah_loket/2",
				//url: "saveto.php",
				type: "POST",
				data: {
					myData: JSON.stringify(postData)
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);					
					if(dataResult.statusCode==200){						
						$("#success").show();
						$('#success').html('Data added successfully !'); 	
						alert("Data Added Successfully Gaes !");
					}
					else if(dataResult.statusCode==201)
					{
					   alert("Data Added Not Successfully Gaes !");
					}
					
				}
			})
              .done(async function (data) {
                  load_neural()
                  alert("Done OKOK!")
                  console.log("Success!")
                  waitingDialog.hide()
                  counter = 1
                  $("#tries").html("Trials left : " + counter)
                  $("#fname").val('')
                
                  $("#prof_img").removeAttr('src')                  
                  $("#fname").prop("readonly", false)
                  
              })
              .fail(function (jqXHR, textStatus, errorThrown) { 
                  alert("Error due to internet connection! Please try again!");
              });
              const descriptions = [];
            }          
          }
          else{
            alert("No FACE detected!");
          }
        }
        else{
          alert("Done Learning!");
          counter = 1;
          const descriptions = [];
        }
      
   
    });
	 $("#capture2").click(async function(){
      var data = 'LOKET3';
      const label = data;         
       
        if(counter <= 1 && counter >= 0 ){
          var canvas = document.createElement('canvas');
          var context = canvas.getContext('2d');
          var video = document.getElementById('vidDisplay');
          context.drawImage(video, 0, 0, 600, 350);
          var capURL = canvas.toDataURL('image/png');
          var canvas2 = document.createElement('canvas');
          canvas2.width = 1200;
          canvas2.height = 800;
          var ctx = canvas2.getContext('2d');
          ctx.drawImage(video, 0, 0, 1200, 800);
          var new_image_url = canvas2.toDataURL();
          var img = document.createElement('img');
          img.src = new_image_url;
          document.getElementById("prof_img").src = img.src;

          const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor();
          if( detections != null){
            descriptions.push(detections.descriptor);
            var descrip = descriptions;
            counter--;
            $("#tries").html("Trials left : " + counter)
            if(counter == 0){
              // Save Image
              $.ajax({
                  type: "POST",
                  url: "http://localhost/facercognation/7/ajax.php",
                  data: {image: img.src ,path: data}
              }).done(function(o) {
                  console.log('Image Saved'); 
              });


              waitingDialog.show('Processing data.............', {dialogSize: 'sm', progressType: 'success'})
              var postData = new faceapi.LabeledFaceDescriptors(label, descrip);
			  
              $.ajax({
                  url: 'json.php',
                  type: 'POST',
                  data: { myData: JSON.stringify(postData) },
                  datatype: 'json'
              })
			  $.ajax({
				  url: "<?php echo site_url();?>welcome/tambah_loket/3",
				//url: "saveto.php",
				type: "POST",
				data: {
					myData: JSON.stringify(postData)
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){						
						$("#success").show();
						$('#success').html('Data added successfully !'); 	
						alert("Data Added Successfully Gaes !");
					}
					else if(dataResult.statusCode==201)
					{
					   alert("Data Added Not Successfully Gaes !");
					}
					
				}
			})
              .done(async function (data) {
                  //load_neural()
                  //alert("Done!")
                  console.log("Success!")
                  waitingDialog.hide()
                  counter = 1
                  $("#tries").html("Trials left : " + counter)
                  $("#fname").val('')
                
                  $("#prof_img").removeAttr('src')                  
                  $("#fname").prop("readonly", false)
                  
              })
              .fail(function (jqXHR, textStatus, errorThrown) { 
                  alert("Error due to internet connection! Please try again!");
              });
              const descriptions = [];
            }          
          }
          else{
            alert("No FACE detected!");
          }
        }
        else{
          alert("Done Learning!");
          counter = 1;
          const descriptions = [];
        }
      
   
    });

    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
    
    $("#fname").keyup(function(){
      var str = $(this).val().toUpperCase();
      $(this).val(str);
      if(format.test(str) && str == ""){
        $(this).css('border','1px solid red');
        $(this).removeClass('active')
      }
      else{
        $(this).css('border','3px solid black');
        $(this).addClass('active')
      }
    });

 
});
</script>

