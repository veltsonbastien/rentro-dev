 
function generatePID(){
 var d = new Date(); 
 var x = d.getTime().toString(); 
 var m = d.getMonth(); 
 var da = d.getDate().toString();
 var y = d.getFullYear().toString(); 
 var p = ""; 
 
 var nums = ["z","o","t","p","f","h","s","c","e","n","d"]; 
 var mons = ["ja","fe","ma","ap","my","jn","jy","au","se","oc","no","de"]; 
 
 var cm = mons[m]; //returns current month identifier
 var daa = da.split(""); //splits the day 
 var dm = [0,0]; 
 var ya = y.split(""); 
 var yaa = [ nums[parseInt(ya[0],10)], nums[parseInt(ya[1],10)], nums[parseInt(ya[2],10)]
           , nums[parseInt(ya[3],10)]]; 


for(var i = 0; i<daa.length; i++){
     dm[i] = nums[i];  //return current day identifier
 }
     var yi = 0; 
     var di = 0; 
     
 for(var i = 0; i<x.length; i++){
     if(i%4===0){
         x = [x.slice(0, i),yaa[yi], x.slice(i)].join('');
         yi++; 
     } if(i%6===0){
         x = [x.slice(0, i), dm[di], x.slice(i)].join('');
         di++; 
     }
 }

 p = cm[0].concat(x).concat(cm[1]); 
 p = p.toUpperCase(); 

 document.write(p); 

 return p; 
}

 
function generateUID(){
 var d = new Date(); 
 var x = d.getTime().toString(); 
 var m = d.getMonth(); 
 var da = d.getDate().toString();
 var y = d.getFullYear().toString(); 
 var p = ""; 
 
 var nums = ["z","o","t","p","f","h","s","c","e","n","d"]; 
 var mons = ["jn","fb","mr","ar","ma","ju","jl","ag","sp","ot","nv","dm"]; 
 
 var cm = mons[m]; //returns current month identifier
 var daa = da.split(""); //splits the day 
 var dm = [0,0]; 
 var ya = y.split(""); 
 var yaa = [ nums[parseInt(ya[0],10)], nums[parseInt(ya[1],10)], nums[parseInt(ya[2],10)]
           , nums[parseInt(ya[3],10)]]; 


for(var i = 0; i<daa.length; i++){
     dm[i] = nums[i];  //return current day identifier
 }
     var yi = 0; 
     var di = 0; 
     
 for(var i = 0; i<x.length; i++){
     if(i%3===0){
         x = [x.slice(0, i),yaa[yi], x.slice(i)].join('');
         yi++; 
     } if(i%7===0){
         x = [x.slice(0, i), dm[di], x.slice(i)].join('');
         di++; 
     }
 }

 p = cm[1].concat(x).concat(cm[0]); 
 p = p.toUpperCase(); 

 document.write(p);

 return p;  
}


function generateOID(){
 var d = new Date(); 
 var x = d.getTime().toString(); 
 var m = d.getMonth(); 
 var da = d.getDate().toString();
 var y = d.getFullYear().toString(); 
 var p = ""; 
 
 var nums = ["z","o","t","p","f","h","s","c","e","n","d"]; 
 var mons = ["ju","fr","mh","al","my","je","jy","as","st","ob","nr","de"]; 
 
 var cm = mons[m]; //returns current month identifier
 var daa = da.split(""); //splits the day 
 var dm = [0,0]; 
 var ya = y.split(""); 
 var yaa = [ nums[parseInt(ya[0],10)], nums[parseInt(ya[1],10)], nums[parseInt(ya[2],10)]
           , nums[parseInt(ya[3],10)]]; 


for(var i = 0; i<daa.length; i++){
     dm[i] = nums[i];  //return current day identifier
 }
     var yi = 0; 
     var di = 0; 
     
 for(var i = 0; i<x.length; i++){
     if(i%3===0){
         x = [x.slice(0, i),yaa[yi], x.slice(i)].join('');
         yi++; 
     } if(i%7===0){
         x = [x.slice(0, i), dm[di], x.slice(i)].join('');
         di++; 
     }
 }

 p = cm[1].concat(x).concat(cm[0]); 
 p = p.toUpperCase(); 

 document.write(p); 

 return p; 
}