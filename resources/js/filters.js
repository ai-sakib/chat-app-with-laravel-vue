import Vue from 'vue'
import moment from 'moment';

Vue.filter('timeformat',(time)=>{
	return moment(time).format("MMMM Do, YYYY"); 
})
Vue.filter('textshort',function(text, length, suffix){
	if(text.length > length){
		return text.substring(0, length)+suffix;
	}else{
		return text.substring(0, length);
	}
	
})