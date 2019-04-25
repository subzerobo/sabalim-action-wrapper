# Sabalim-Action-Wrapper  
  
Action Wrapper Library for Before/After Specific action handling, this library provides the abstraction layer for other libraries specially for Sabalim-Elastic-Apm-PHP-Agent.  
  
### HandlerInterface  
Interface provides two functions which whould run before and after any specific action  

    interface HandlerInterface{
        public function handleBefore($parent, string $actionName, array $actionData = []); 
        public function handleAfter($parent, string $actionName, array $actionData = []);
    }
`$parent` is your main object which it's action(s) need to be wrapped for example you can pass the `redis` object
`$actionName` is the context of the action you are trying to wrap 
`$actionData` is the extra data you whould like to pass to the wrapper

### HandlerAbstract
HandlerAbstract class implements the HandlerInterface and does claculate the action event duration by default but you can pass the `start` and `end` microtime to override the default implemented code

It has the built-in DataStore to save the extra parameters passed in `handleBefore` to be used later in `handlerAfter` method.

Your custom handlers may extend this class.

    class myCustomHandler extends HandlerAbstract
    {
     	private $your_custom_private;
     	public $your_custom_public;
    
	    public function handleBefore($request, string $actionName, array $actionData = [])  
	    {  
		      parent::handleBefore($request, $actionName, $actionData);  
		      // Your code ...
	    }
		public function handleAfter($request, string $actionName, array $actionData = [])  
		{  
			      parent::handleAfter($request, $actionName, $actionData);  
			      // Your code ...
		}
    }
