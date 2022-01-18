resource "google_container_analysis_note" "note" {
  name = var.attestor_note
  attestation_authority {
    hint {
      human_readable_name = "Attestor Note"
    }
  }
}

resource "google_binary_authorization_attestor" "attestor" {
  name = var.attestor_name
  attestation_authority_note {
    note_reference = google_container_analysis_note.note.name
    public_keys {
      id  = data.google_kms_crypto_key_version.version.id
      pkix_public_key {
        public_key_pem      = data.google_kms_crypto_key_version.version.public_key[0].pem
        signature_algorithm = data.google_kms_crypto_key_version.version.public_key[0].algorithm
      }
    }
  }
}

data "google_kms_crypto_key_version" "version" {
  crypto_key = var.crypto_key_id
}
