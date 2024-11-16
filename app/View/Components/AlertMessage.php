

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    public $type;
    public $alertMessage;

    public function __construct($type, $alertMessage)
    {
        $this->type = $type;
        $this->alertMessage = $alertMessage;
    }

    public function render()
    {
        return view('components.alert-message');
    }
}
