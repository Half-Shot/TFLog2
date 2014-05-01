/* 
 * The MIT License
 *
 * Copyright 2014 will.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
$(".BATapplyButton").click( function(){
    div = $(this.parentElement.parentElement.parentElement.parentElement); //Pro code.
    form = div.find("form")[0];
    inputs = $(form).find("input");
    jsonObject = {ajaxEvent: "BreadAdminTools.SaveCoreSettings",ajaxModule:"BreadAdminTools"};
    $(inputs).each(function(i,element) {
        name = element.id;
        val = element.value;
        if(element.type == "number")
        {
            jString = '{"' + name + '":' + val + '}';
        }
        else if(element.type == "checkbox") 
        {
            val = element.checked;
            jString = '{"' + name + '":' + val + '}';
        }
        else
        {
            jString = '{"' + name + '":"' + val + '"}';
        }
        
        $.extend(jsonObject,$.parseJSON(jString))
    });
    $.post( "index.php", jsonObject, function(returndata)
    {
        if(returndata != "0"){
            alert("Something went wrong :|");
        }
    });
});
