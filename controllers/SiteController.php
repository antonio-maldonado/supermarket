<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use app\models\Product;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /*
    *  Realizamos la acción de Tienda
    */
    public function actionShop($producto = null, $cantidad = null)
    {

        //echo ($producto);
        //echo ($cantidad);
        
        if(($producto != null) || ($cantidad != null)){
            return $this->render('shop', ["producto" => $producto, "cantidad" => $cantidad]);
        }else{
            return $this->render('shop', ["producto" => null, "cantidad" => null]);
        }

    
    }
    
    public function actionRequest() {
    	 
    	 $producto = null;
    	 $cantidad = null;
    	if(isset($_REQUEST["nombre"])) {
			if(isset($_REQUEST["cantidad"])){	    		
    		$producto = $_REQUEST["nombre"];
    		$cantidad = $_REQUEST["cantidad"];
    		
    		
    		
    		}
    	}
    	
    	
    	$this->redirect(["site/shop", "producto" => $producto, "cantidad" => $cantidad]); 
    }
		public function actionFinish() {
			
    	 
    	 $count =1;
    	
    	$this->redirect(["site/shop", "producto" => $producto, "cantidad" => $cantidad]); 
    }
    /*
    *   Realizamos la acción de productos del hogar
    */
    public function actionDomestic_products(){
        return $this->render('domestic_products');
    }

    
    /*
    *   Realizamos la acción de productos del hogar
    */
    public function actionWhite_line(){
        return $this->render('white_line');
    }

    /*
     * Se diferencia las acciones al nombrerlo acción.
     * Probaremos el primer action 
     */
    public function actionSay($message = 'Hola')
    {
         return $this->render('say', ['message' => $message]);
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        // Realizamos una validación previa, esta compara si el usuario
        // esta como invitado o como usuario
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // Hacemos uso del modelo de LoginForm que tiene por defecto yii2
        $model = new LoginForm();

        // Realizamos validaciones, esta por su parte, obtiene todos las
        // variables publicas del modelo LoginForm,
        // Estos son los siguientes: ( $username, $password ,
        // $rememberMe = true y $_user = false
        // Aclaramos que obtiene un POST de esas variables
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Si no se cumple la sentencia anterior, se retorna,
            // Cabe mencionar que el método POST hace referencia a las reglas
            // previamente definidas
            return $this->goBack();                       
        }

        // Inicializamos la variable pública password,
        // debido a que al utilizar de nuevo la acción
        // esta tiene que eliminar todo valor de esa variable
        $model->password = '';

        // Redireccionamos hacia la vista login, la cual se ubica
        // en views/site/login, no sin antes pasar los datos
        // del modelo utiliza, en este caso los valores de LoginForm
        return $this->render('login', [
            'model' => $model,          // Valores que pasamos a la vista login
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
     * Action al realizar por el User
     */
    public function actionUser()
    {
    
        $model = new UserForm();

    if($model->load(Yii::$app->request->post()) && $model->validate()){
        Yii::$app->session->setFlash('success','You have entered the data correctly');

        return $this->refresh();
    }


        return $this->render('user',['model'=>$model]);


        /*
$model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
        */
    }
}
