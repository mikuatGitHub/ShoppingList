'use strict';
{
const checkboxes= document.querySelectorAll('input[type="checkbox"]');
checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change',() => {
  checkbox.parentNode.submit()
  })
})

const deletes= document.querySelectorAll('.delete');
deletes.forEach(span => {
  span.addEventListener('click',() => {
    if(!confirm('Are you sure?')){
    return
    }
  span.parentNode.submit()
 })
})

// //purge処理
// const purge= document.querySelector('.purge');
// purge.addEventListener('click',() => {
//   if(!confirm('Are you sure?')){
//     return;}/*deleteをconfirmするか確認、キャンセルされたらreturn */

//   const url= '?action=purge'
//   const options= {
//     method: 'POST',
//     body: new URLSearchParams({
//      token: token,})};
//  fetch(url,options)/*ページ遷移せずに送信する命令fetch */

//   const lis= document.querySelectorAll('li');
//   lis.forEach(li => {
//     if(li.children[0].checked){
//      li.remove();
//     }
//   })
// })/*addEventListener(click) */

}