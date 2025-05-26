<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBirthdayInvitationRequest;
use App\Http\Requests\UpdateBirthdayInvitationRequest;
use App\Services\BirthdayInvitationService;
use Illuminate\Http\Request;

class BirthdayInvitationController extends Controller
{
    protected $BirthdayInvitationService;

    public function __construct(BirthdayInvitationService $BirthdayInvitationService)
    {
        $this->BirthdayInvitationService = $BirthdayInvitationService;
    }

    public function index()
    {
        return $this->BirthdayInvitationService->getAll();
    }

    public function store(StoreBirthdayInvitationRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('group_photo')) {

            $image = $request->file('group_photo');

            $imageName = time().'.'.$image->getClientOriginalName();
            $image->move(public_path('images/invitations'),$imageName);

            $data['group_photo'] = $imageName;
        }
        return $this->BirthdayInvitationService->create($data);
    }

    public function show($id)
    {
        return $this->BirthdayInvitationService->getById($id);
    }

    public function update(UpdateBirthdayInvitationRequest $request, $id)
    {
        return $this->BirthdayInvitationService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->BirthdayInvitationService->delete($id);
        return response()->json(null, 204);
    }
}
