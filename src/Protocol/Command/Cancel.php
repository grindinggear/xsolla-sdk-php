<?php

namespace Xsolla\SDK\Protocol\Command;

use Symfony\Component\HttpFoundation\Request;
use Xsolla\SDK\Storage\PaymentsInterface;
use Xsolla\SDK\Storage\ProjectInterface;

class Cancel extends Command
{
    protected $project;
    protected $payments;
    public function __construct(ProjectInterface $project, PaymentsInterface $payments)
    {
        $this->project = $project;
        $this->payments = $payments;
    }

    public function process(Request $request)
    {

    }

    public function checkSign(Request $request)
    {
        $signString = $request->get('command').$request->get('id').$this->project->getSecretKey();
        return (md5($signString) == $request->get('md5'));
    }
}