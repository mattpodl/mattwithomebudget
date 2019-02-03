// example for calling the PUT /notes/1 URL
var baseUrl = OC.generateUrl('/apps/mattwithomebudget');
var note = {
    title: 'New expense',
    content: 'This is the expense description'
};
var id = 1;
$.ajax({
    url: baseUrl + '/expenses/' + id,
    type: 'PUT',
    contentType: 'application/json',
    data: JSON.stringify(note)
}).done(function (response) {
    // handle success
}).fail(function (response, code) {
    // handle failure
});
