<?php
/* ========================================================================
* MERS: Modern Event Registration System
* https://github.com/a-zog
* ========================================================================
* Copyright (c) 2014 Zoghlami Ahmed
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
* ======================================================================== */
?>

<?php 
include('header.php');
?>


                 

                    <div class="jumbotron">


<?php
$lib= new ERS;
?><?php if ($lib->getEventLogo() != false) {?> <h1>Welcome to <small><img src="<?php echo $lib->getEventLogo(); ?>"/></small></h1> <?php }else{ echo "<h1>Welcome !</h1>";} ?>

                        
                        

                        <p> 
                        Welcome to the <?php if ($lib->getEventName() != false) {echo $lib->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration Management, This service will allow you to quickly manage visitors the day of the event, even in offline mode.</p>
                        <p><a href="em.php" class="btn btn-primary btn-lg" data-original-title="" title="">Easy Management <span class="zicon-right-open-5"></span></a></p>
                    </div>
             


<?php include("footer.php"); ?>

  
</body>
</html>