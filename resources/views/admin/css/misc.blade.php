<style>
#spinner{
    position:absolute;
    top:0;
    right:0;
    margin-top:58px;
    margin-right:27px;
}

.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
.border-inactive{
  border:none;
}

.border-active{
  border: 1px solid  #dee2e6;
  border-radius: 10px;
}

.borderactiveblue{
  border: 1px solid #4baae2 !important;
}
.table td{
  vertical-align:middle !important;
  text-align:center;
}
.table th{
  text-align:center;
}
.alert-success-modal{
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s 2s, opacity 5s linear;
}
.custom-modal {
    display:    block;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgb(0 0 0 / 92%)
                url({{url('/images/ajax-loader.gif')}}) 
                50% 50% 
                no-repeat;
}

.custom-modal-none {
    overflow: hidden;   
    display: none !important;

}
</style>