module "kms_keyring" {
  source      = "./Modules/kms/"
  project     = var.project
  key_ring    = var.key_ring
  location    = var.location 
  crypto_key  = var.crypto_key
  purpose     = var.purpose
  algorithm   = var.algorithm 
   
}

module "attestor_creation" {
  source  = "./Modules/attestor/"
  attestor_note = var.attestor_note
  attestor_name = var.attestor_name
  crypto_key_id = module.kms_keyring.kms_id

}
