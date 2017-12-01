<?php adminSecurity(); ?>

<h1>Admin Page</h1>

<div class="row">
    <a href="<?=RACINE?>/Home/Admin/users/">
       <div class="col s12 m4">
         <div class="card yellow darken-1">
           <div class="card-content white-text">
             <span class="card-title center">User Manager</span>
             <p>Add, Update and Delete Users</p>
           </div>
         </div>
       </div>
    </a>
       <a href="<?=RACINE?>/Home/Admin/articles/">
           <div class="col s12 m4">
             <div class="card red darken-1">
               <div class="card-content white-text">
                 <span class="card-title center">Articles Manager</span>
                 <p>Add, Update and Delete Articles</p>
               </div>
             </div>
           </div>
       </a>

       <a href="<?=RACINE?>/Home/Admin/categories/">
           <div class="col s12 m4">
             <div class="card #29b6f6 light-blue lighten-1">
               <div class="card-content white-text">
                 <span class="card-title center">Category Manager</span>
                 <p>Add, Update and Delete Categoies</p>
               </div>
             </div>
           </div>
       </a>

       <a href="<?=RACINE?>/Home/Admin/comments/">
           <div class="col s12 m4">
             <div class="card pink lighten-1">
               <div class="card-content white-text">
                 <span class="card-title center">Comment Manager</span>
                 <p>Add, Update and Delete Comments</p>
               </div>
             </div>
           </div>
       </a>
       <a href="<?=RACINE?>/Home/Admin/comments/">
           <div class="col s12 m4">
             <div class="card green lighten-1">
               <div class="card-content white-text">
                 <span class="card-title center">Tag Manager</span>
                 <p>Add, Update and Delete Tags</p>
               </div>
             </div>
           </div>
       </a>
</div>
