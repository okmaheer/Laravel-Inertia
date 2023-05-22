<template>
    <h1>Users</h1>
    <Nav/>
   <div style="margin-top: 800px;" >
<p> 
    The current ime is {{time }}
</p>
   </div>
</template>
<script>
import Nav from '../Shared/Nav.vue'
export default {
    components: { Nav },
    props:{
        time:String
    }
}
</script>