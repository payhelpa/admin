<?php

namespace  App\Enums;

enum TransactionStatusEnum: int
{
    case CANCEL_TRANSFER = 0;
    case CREDIT_WALLET = 1;
    case CONFIRMING_TRANSFER = 2;
    case TRANSFER_CONFIRMED = 3;
    case PROCESSING_TRANSACTION = 4;
    case AWAITING_CONFIRMATION = 5;
    case TRANSFER_SUCCESSFUL = 6;

}
