window.addEventListener('ElementDeleted', event => {


  swal.fire(
    'Success',
    'Element successfuly deleted',
    'success'
  )

    
    
    })
    
    
     window.addEventListener('FileNotFound', event => {
    
      swal({
      title: "Error!",
      text: "File not found!",
      icon: "warning",
    
    });
    
    
    })
    
    
    window.addEventListener('ProcessEnded', event => {
    
    swal({
    title: "Error!",
    text: "Process has been ended!",
    icon: "success",
    
    });
    
    
    })
    
    
    
    window.addEventListener('RefreshDropDown', event => {
    
      $('.dropdown-toggle').dropdown()
    
    })

    window.addEventListener('NetworkAdded', event => {

 
      swal.fire(
        'Success',
        'Network has been added',
        'success'
      )

  
  })

  window.addEventListener('NetworkUpdated', event => {

 
    swal.fire(
      'Success',
      'Network has been updated',
      'success'
    )


})



window.addEventListener('ChannelAdded', event => {

 
  swal.fire(
    'Success',
    'Channel has been added',
    'success'
  )


})


window.addEventListener('ChannelUpdated', event => {

 
  swal.fire(
    'Success',
    'Channel has been updated',
    'success'
  )


})


window.addEventListener('PlayerAdded', event => {

 
  swal.fire(
    'Success',
    'Player has been added',
    'success'
  )


})



window.addEventListener('PlayerUpdated', event => {

 
  swal.fire(
    'Success',
    'Player has been updated',
    'success'
  )


})



window.addEventListener('RoleAdded', event => {

 
  swal.fire(
    'Success',
    'Role has been added',
    'success'
  )


})


window.addEventListener('RoleUpdated', event => {

 
  swal.fire(
    'Success',
    'Role has been updated',
    'success'
  )


})



window.addEventListener('UserAdded', event => {

 
  swal.fire(
    'Success',
    'User has been added',
    'success'
  )


})


window.addEventListener('UserUpdated', event => {

 
  swal.fire(
    'Success',
    'User has been updated',
    'success'
  )


})


window.addEventListener('EmailAdded', event => {

 
  swal.fire(
    'Success',
    'Email has been added',
    'success'
  )


})


window.addEventListener('EmailUpdated', event => {

 
  swal.fire(
    'Success',
    'Email has been updated',
    'success'
  )


})


window.addEventListener('PlanningAdded', event => {

 
  swal.fire(
    'Success',
    'Planning has been added',
    'success'
  )


})


window.addEventListener('PlanningUpdated', event => {

 
  swal.fire(
    'Success',
    'Planning has been updated',
    'success'
  )


})