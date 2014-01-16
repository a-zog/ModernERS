<?php
/* ========================================================================
* MERS: Modern Event Registration System
* https://github.com/a-zog/ModernERS
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
// same header will be included in each page (except for admin)
include('page/header.php');
$lib=new ERS();
?>


<?php 
if (isset($_GET["p"])){
	$page=$_GET["p"];
	switch ($page) {
		case 'refresh':
		include('page/refresh.php');
		break;
		
		case 'em':	
		include('page/em.php');
		break;

		case 'overview':	
		include('page/overview.php');
		break;
		
		case 'stats':	
		include('page/stats.php');
		break;

		case 'settings':	
		include('page/settings.php');
		break;

		default:
		$lib->showLandingPage();
		break;
	}
}else{
	$lib->showLandingPage();

}
?>



<?php
// same footer will be included in each page (even for admin pages)
include("page/footer.php"); ?>


</body>
</html>