const APIKey = 2adb6f0d8b98f55b13b32d85e20665ac
const cityLattitude = -37.814
const cityLongitude = 144.9633 //if we have time we should see if we can implement a change in location

//https://reqbin.com/code/javascript/wc3qbk0b/javascript-fetch-json-example#:~:text=How%20to%20fetch%20JSON%20data,server's%20response%2C%20and%20the%20response.
fetch(`https://api.openweathermap.org/data/2.5/weather?&lat=${cityLattitude}&long=${cityLongitude}&appid=${APIKey}&units=metric`)
	.then(response => response.json())
   	.then(json => {
   		//THIS IS NOT FUNCTIONAL
   		// if ( 0 < json.main.temp > 5) {

   		// }
   	});
/*
if (temperature < 0 ) {
  image_displayed = ;
} else if (temperature < 10) {
  image_displayed = ;   
} else if (temperature < 20) {
  image_displayed = ;   
} else if (temperature < 30) {
  image_displayed = ;   
} else if (temperature <= 40) {
  image_displayed = ;   
}
*/