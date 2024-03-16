<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeUser; 
use App\Models\User;// Necesitamos importar el modelo User
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    public function index(string $userId): View // Cambié $id a $userId para coincidir con el parámetro
    {
        // Aquí había un error, debería ser $userId en lugar de $id
        $user = User::findOrFail($userId);
        $challenges = Challenge::all();
    
        $viewData = [
            'challenges' => [],
        ];
    
        foreach ($challenges as $challenge) {
            // Verificar si el usuario ha completado el desafío
            $challengeUser = ChallengeUser::where('user_id', $user->getId())
                                           ->where('challenge_id', $challenge->getId())
                                           ->first();

            if (!$challengeUser || !$challengeUser->getChecked()) {
                $viewData['challenges'][] = [
                    'id' => $challenge->getId(),
                    'name' => $challenge->getName(),
                    'description' => $challenge->getDescription(),
                    'checked' => $challenge->getChecked(),
                    'reward_coins' => $challenge->getRewardCoins(),
                    'max_users' => $challenge->getMaxUsers(),
                    'current_users' => $challenge->getCurrentUsers(),
                    'expiration_date' => $challenge->getExpirationDate(),
                    'category_id' => $challenge->getCategoryId(),
                    'category_quantity' => $challenge->getCategoryQuantity(),
                ];
            }
        }

        // Cambié el nombre de la variable de retorno para que coincida con el nombre en la vista
        return view('challenge.index')->with('viewData', $viewData);
    }

}
