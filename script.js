// variables
  const tracks = document.querySelectorAll(".track");
  const videoPlayer = document.querySelector("#video-player");
  const vidMenu = document.querySelector('.vid-menu');
  const showMenu = document.querySelector('.show-menu');
  const mainVideo = document.querySelector('.main-video');
  const menuOverlay = document.querySelector('.menu-overlay');
  
  let currentTrack = 0;
  let isPlaying = false;

  // Play the video when a track is clicked
  tracks.forEach((track, index) => {
	track.addEventListener("click", () => {
	  // The two lines below  will load the first video file and class when clicked
	  track.classList.add("active");
	  vidMenu.classList.remove("show");
	  showMenu.classList.remove("show");
	  menuOverlay.classList.remove("show");
	  mainVideo.classList.add("show");
	  videoPlayer.src = track.dataset.src;
	  videoPlayer.muted = false;
	  videoPlayer.loop = false;
	  if (currentTrack !== index) {
		//Remove Loop if looped
		videoPlayer.loop = false;
		// Unmute if muted
		videoPlayer.muted = false;
		// Remove the active class from the previous track
		tracks[currentTrack].classList.remove("active");
		// Set the new current track
		currentTrack = index;
		// Load the new video source
		videoPlayer.src = track.dataset.src;
		// Set the active class on the new track
		track.classList.add("active");
		// Play the video
		videoPlayer.play();
		isPlaying = true;
	  } else {
		// Toggle play/pause when clicking on the current track
		if (isPlaying) {
		  videoPlayer.pause();
		  isPlaying = false;
		} else {
		  videoPlayer.play();
		  isPlaying = true;
		}
	  }
	});
  });

  // Advance to the next track when the current track ends
  videoPlayer.addEventListener("ended", () => {
	// Remove the active class from the current track
	tracks[currentTrack].classList.remove("active");
	// Move to the next track
	currentTrack = (currentTrack + 1) % tracks.length;
	// Load the new video source
	videoPlayer.src = tracks[currentTrack].dataset.src;
	// Set the active class on the new track
	tracks[currentTrack].classList.add("active");
	// Play the video
	videoPlayer.play();
	isPlaying = true;
  });

  // Remove the active class from all tracks when a new track is selected
  videoPlayer.addEventListener("play", () => {
	tracks.forEach((track) => {
	  if (track !== tracks[currentTrack]) {
		track.classList.remove("active");
	  }
	});
  });

 

  // Menu Controls
  showMenu.addEventListener('click', toggleClass);
  mainVideo.addEventListener('click', removeClass);
  menuOverlay.addEventListener('click', removeClass);
  // define the toggleClass function
  function toggleClass() {
	// toggle the class on both elements
	vidMenu.classList.toggle('show');
	showMenu.classList.toggle('show');
	menuOverlay.classList.toggle('show');
  }

  function removeClass() {
	// toggle the class on both elements
	vidMenu.classList.remove('show');
	showMenu.classList.remove('show');
	menuOverlay.classList.remove('show');
  }


// Refresh
  function refreshPage() {
	// Reload the CSS file
	var links = document.getElementsByTagName("link");
	for (var i = 0; i < links.length; i++) {
	  if (links[i].rel === "stylesheet") {
		links[i].href += "?refresh=" + new Date().getMilliseconds();
	  }
	}
  
	// Reload the page content
	location.reload();
  }
  
  // Attach the click event listener to the button or element
  var refreshButton = document.getElementById("refreshButton");
  refreshButton.addEventListener("click", refreshPage);