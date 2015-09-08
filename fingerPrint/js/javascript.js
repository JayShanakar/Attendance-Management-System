var flag=0;
var course_canvas;

function load()
{
    alert("Hii");
    
}


window.onload = function hide ()
{
    
    var divOne = document.getElementById("hidden");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("sun");
    if (divOne != null)
        divOne.style.display='none';
       
       
       
    divOne = document.getElementById("mon");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("tue");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("thu");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("fri");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("wed");
    if (divOne != null)
        divOne.style.display='none';
       
    divOne = document.getElementById("sat");
    if (divOne != null)
        divOne.style.display='none';
       
    
      
}
function copy()
{
    var index = new Array('fri_time1_start','fri_time1_end','fri_time2_start','fri_time2_end',
        'tue_time1_start','tue_time1_end','tue_time2_start','tue_time2_end',
        'wed_time1_start','wed_time1_end','wed_time2_start','wed_time2_end',
        'thu_time1_start','thu_time1_end','thu_time2_start','thu_time2_end'
        );
   
    var t1 = document.getElementsByName('mon_time1_start')[0].value ;
    var t2 = document.getElementsByName('mon_time1_end')[0].value ;
    var t3 = document.getElementsByName('mon_time2_start')[0].value ;
    var t4 = document.getElementsByName('mon_time2_end')[0].value;
    var i = 0 ;
    if ((t3 != "") && (t4 != "") )
    {
        show('Tue','tue');
        show('Wed','wed');
        show('Thu','thu');
        show('Fri','fri');
      
        while (i < 15)
        {
            document.getElementsByName(index[i++])[0].value = t1 ;
            document.getElementsByName(index[i++])[0].value = t2 ;
            document.getElementsByName(index[i++])[0].value = t3 ;
            document.getElementsByName(index[i++])[0].value = t4 ;
          
        }
    }
    else
    {
        i = 0 ;
        while (i < 15)
        {
            document.getElementsByName(index[i++])[0].value = t1 ;
            document.getElementsByName(index[i++])[0].value = t2 ;
            i = i + 2 ;          
        }
    }
  
  
   
}
function show (a ,b)
{
    var divOne = document.getElementById(b);
    var but = document.getElementById(a);
       
    if (divOne.style.display != "block")
    {
        divOne.style.display = 'block';
        a.value = "  -1 Slot  ";
    }
    else if (divOne.style.display != "none")
    {
        divOne.style.display = 'none';
        a.value = "  +1 Slot  ";
    }
}

function show1 (a )
{
    var divOne = document.getElementById(a);
       
       
    if (divOne.style.display != "block")
    {
        divOne.style.display = 'block';
       
    }
    else if (divOne.style.display != "none")
    {
        divOne.style.display = 'none';
       
    }
       
      
}
      



function show_courses() {
     
    course_canvas=document.getElementById("course_canvas");
    if(flag==0)
    {
        var url = "listener.php?action=show_course";
        req = initRequest();
        req.open("GET", url, true);
        req.onreadystatechange = callback;
        req.send(null);
        flag=1;
    }
    else
    {
        flag=0;
        remove_elements(course_canvas);
    }
         
}

function remove_elements(ele)
{
    for (loop = ele.childNodes.length -1; loop >= 0 ; loop--) {
        ele.removeChild(ele.childNodes[loop]);
    }
}

function initRequest() {
    
    if (window.XMLHttpRequest) {
        if (navigator.userAgent.indexOf('MSIE') != -1) {
            isIE = true;
        }
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        isIE = true;
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function callback() {
 

    if (req.readyState == 4) {
        if (req.status == 200) {
          
            parseMessages(req.responseXML);
        }
    }
    
}

function parseMessages(responseXML) {

    // no matches returned
   
    if (responseXML == null) {
         
        return false;
        
    } else {
        var courses = responseXML.getElementsByTagName("courses")[0];
 
        if (courses.childNodes.length > 0) {
               
            for (loop = 0; loop < courses.childNodes.length; loop++) {
                    
                var course = courses.childNodes[loop];
                    
                var course_name = course.getElementsByTagName("course_name")[0].childNodes[0].nodeValue;
                   
                var course_id = course.getElementsByTagName("course_id")[0].childNodes[0].nodeValue;
                     
                    
                linkElement = document.createElement("a");
                linkElement.appendChild(document.createTextNode(course_name));
                linkElement.setAttribute("href", "facindex.php?page=course_sel&id="+course_id);
                // linkElement.setAttribute("onclick", "show_selected(this)");
                course_canvas.appendChild(linkElement);
                linkElement = document.createElement("br"); 
                course_canvas.appendChild(linkElement);
                    
                    
                   
            }
        }
    }
       
}
